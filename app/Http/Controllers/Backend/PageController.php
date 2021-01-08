<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Alias;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
   	{
   		return view('Backend.pages.index');
   	}

   	public function data()
   	{
   		$query = Page::query();
   		return datatables()->of($query)->toJson();
   	}

   	public function getForm($id = null)
   	{
   		$item = Page::find($id);
        if (!$item) $item = [];  

        return view('Backend.pages.form', compact('item', 'id'));
   	}

   	public function postForm($id = null) 
   	{
   		$data = request()->validate([
   			'title_ru'  => 'required|max:255',
            'title_uz'  => 'nullable|max:255',
            'title_en'  => 'nullable|max:255',
            'short_text_ru'  => 'nullable',
            'short_text_uz'  => 'nullable',
            'short_text_en'  => 'nullable',
            'text_ru'  	=> 'required',
            'text_uz'  	=> 'nullable',
            'text_en'  	=> 'nullable',
   		]);

   		if ($id == null) {
   			$data['alias'] = Alias::alias(new Page, $data['title_ru']);
   			$item = Page::create($data);
   			session()->flash('success', trans('alert.success.insert'));
   		} else {
   			$item = Page::find($id);            
            $item->update($data);
            session()->flash('success', trans('alert.success.update'));
        }

   		return redirect()->route('backend.page.index');
   	}

   	public function delete()
   	{
   		if (request()->has('id')) {
            $item = Page::find(request()->input('id'));
   			$item->delete();

   			$response = [
                'status' => 'success',
                'message' => trans('alert.success.delete')
            ]; 
   		} else {
   			$response = [
                'status' => 'error',
                'message' => 'Пожалуйста попробуйте снова'
            ];
   		}

   		return response()->json($response);
   	}

    public function filemanager()
    {
        return view('Backend.filemanager.index');
    }
}
