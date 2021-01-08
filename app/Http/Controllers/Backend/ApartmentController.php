<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Floor;
use App\Models\Block;
use Storage;

class ApartmentController extends Controller
{
    public function index($block_id, $floor_id)
    {
        $floor = Floor::findOrFail($floor_id);
        $block = Block::findOrFail($block_id);
        return view('backend.apartments.index', ['block_id' =>$block_id, 'floor_id' => $floor_id]);
    }

    public function data()
    {
        $query = Apartment::where('floor_id', request()->get('floor_id'));
        return datatables()->of($query)
        ->editColumn('status_name', function($item) {
            switch ($item->status) {
                case 2:
                  return  '<p class="bg-gradient-success rounded text-center font-weight-bold py-1 px-1 text-white shadow" style="font-size: 12px">Продана</p>';
                  break;
                case 1:
                  return  '<p class="bg-gradient-warning rounded text-center font-weight-bold py-1 px-1 text-white shadow" style="font-size: 12px">Забронирована</p>';
                  break;
                case 0:
                return '<p class="bg-gradient-info rounded text-center font-weight-bold py-1 px-1 text-white shadow" style="font-size: 12px">В продаже</p>';
                  break;
              }
        })
        ->editColumn('img', function($item) {
            return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
        })->rawColumns(['img', 'status_name'])
        ->toJson();
    }

    public function form()
    {
		$id = request()->id;
        $data = request()->validate([
            'floor_id'       => 'required|integer|exists:floors,id',
            'total_area'     => 'required|between:0,99.99',
            'balcony'        => 'required|between:0,99.99',
            'rooms'          => 'required|in:1,2,3,4,5,6,7,8,9,10',            
            'entrance'       => 'required|integer',            
            'ceiling_height' => 'required|between:0,99.99',
            'price'          => 'required|max:255',
            'status'         => 'required|in:0,1,2',
            'img'            => 'nullable|mimes:jpg,jpeg,png|max:50000',
            'img_schema'     => 'nullable|mimes:jpg,jpeg,png|max:50000',
            'number'         =>  'required|integer'
        ]);        

        $entered = Apartment::find($id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('apartment sucessfully updated!');
        } else {
            $entered = Apartment::create($data);            
            $message = trans('apartment sucessfully added!');
		}
		
		if (request()->hasFile('img')){
			$image = public_path('storage/'.$entered->img);
			if (file_exists($image)) {
				unlink($image);
			}
            $data['img'] = request()->file('img')->store('apartments/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
        }
        
        if (request()->hasFile('img_schema')){
			$image = public_path('storage/'.$entered->img_schema);
			if (file_exists($image)) {
				unlink($image);
			}
            $data['img_schema'] = request()->file('img_schema')->store('apartments/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img_schema']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Apartment::find(request()->input('id'));
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('apartment sucessfully removed!')
            ];                                   
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Пожалуйста попробуйте снова'
            ];
        }
      
      return response()->json($response);
    }
}
