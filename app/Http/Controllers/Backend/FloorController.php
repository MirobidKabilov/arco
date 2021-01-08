<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\Block;
use Storage;

class FloorController extends Controller
{
    public function index($id)
    {
        $block = Block::findOrFail($id);
        return view('backend.floors.index', ['id' => $id]);
    }

    public function data()
    {
        $query = Floor::withCount('apartments')->where('block_id', request()->get('block_id'));
        return datatables()->of($query)
            ->addColumn('apartment_url', function($item) {
                return route('backend.apartments.show', [$item->block_id, $item->id]);
            })
            ->addColumn('block_name', function($item) {
                return $item->block->name_ru;
            })->editColumn('img', function($item) {
                return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
            })->rawColumns(['img'])
            ->toJson();
    }

    public function form()
    {
		$id = request()->id;
        $data = request()->validate([
            'block_id'     =>  'required|integer|exists:blocks,id',
            'number'       =>  'required|integer',
            'svg_code'     =>  'nullable',
            'img'          =>  'nullable|mimes:jpg,jpeg,png|max:50000' 
        ]);        

        $entered = Floor::find($id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('floor sucessfully updated!');
        } else {
            $entered = Floor::create($data);            
            $message = trans('floor sucessfully added!');
		}
		
		if (request()->hasFile('img')){
			$image = public_path('storage/'.$entered->img);
			if (file_exists($image)) {
				unlink($image);
			}
            $data['img'] = request()->file('img')->store('floors/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Floor::find(request()->input('id'));
			if ($item->apartments()->count() > 0) {
				$response = [
					'status' => 'error',
					'message' => 'Пожалуйста попробуйте снова'
				];
			} else {
				if (Storage::disk('public')->exists($item->img)) {
                    Storage::disk('public')->delete($item->img);
                }
				$item->delete();
				$response = [
					'status' => 'success',
					'message' => trans('floor sucessfully removed!')
				];
			}			
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Пожалуйста попробуйте снова'
            ];
        }
      
      return response()->json($response);
    }
}
