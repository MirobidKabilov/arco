<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Storage;

class GalleryController extends Controller
{
    public function index()
    {
        return view('backend.gallery.index');
    }

    public function data()
    {
        $query = Gallery::query();
        return datatables()->of($query)
        ->editColumn('img', function($item) {
            return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
        })->rawColumns(['img'])
        ->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'img'   =>  'required|mimes:jpg,jpeg,png|max:50000'           
        ]);        

        $entered = Gallery::find(request()->id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('slider sucessfully updated!');
        } else {
            $entered = Gallery::create($data);            
            $message = trans('slider sucessfully added!');
		}
		
		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('gallery/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Gallery::find(request()->input('id'));			
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('slider sucessfully removed!')
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
