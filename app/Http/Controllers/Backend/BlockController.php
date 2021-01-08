<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use Storage;

class BlockController extends Controller
{
    public function index()
    {
        return view('backend.blocks.index');
    }

    public function data()
    {
        $query = Block::withCount('floors');
        return datatables()->of($query)
            ->addColumn('floor_url', function($item) {
                    return route('backend.floors.show', [$item->id]);
                })
            ->editColumn('img', function($item){
                return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
            })->rawColumns(['img'])
            ->toJson();
    }

    public function form()
    {
		$id = request()->id;
        $data = request()->validate([
            'name_ru'      => 'required|max:255',
            'name_uz'      => 'required|max:255',
            'name_en'      => 'nullable|max:255',
            'svg_code'     => 'nullable',
            'img'          => 'nullable|mimes:jpg,jpeg,png|max:50000' 
        ]);        

        $entered = Block::find($id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('block sucessfully updated!');
        } else {
            $entered = Block::create($data);            
            $message = trans('block sucessfully added!');
		}
		
		if (request()->hasFile('img')){
			$image = public_path('storage/'.$entered->img);
			if (file_exists($image)) {
				unlink($image);
			}
            $data['img'] = request()->file('img')->store('blocks/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Block::find(request()->input('id'));
			if ($item->floors()->count() > 0) {
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
					'message' => trans('block sucessfully removed!')
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
