<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Storage;

class PartnerController extends Controller
{
    public function index()
    {
        return view('backend.partners.index');
    }

    public function data()
    {
        $query = Partner::query();
        return datatables()->of($query)
        ->editColumn('img', function($item) {
            return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
        })->rawColumns(['img'])
        ->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'title_ru'          => 'required|max:255',
            'title_uz'          => 'required|max:255',
            'title_en'          => 'nullable|max:255',
            'link'              => 'required|max:255',
            'img'               => 'required|mimes:jpg,jpeg,png|max:50000'           
        ]);       

        $entered = Partner::find(request()->id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('partner sucessfully updated!');
        } else {
            $entered = Partner::create($data);            
            $message = trans('partner sucessfully added!');
		}
		
		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('partners/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Partner::find(request()->input('id'));
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();            
            $response = [
                'status' => 'success',
                'message' => trans('partner sucessfully removed!')
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
