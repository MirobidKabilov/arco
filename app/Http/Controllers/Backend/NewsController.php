<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Yajra\DataTables\Utilities\Helper;
use Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view('backend.news.index');
    }

    public function data()
    {
        $query = News::query();
        return datatables()->of($query)
			->editColumn('img', function($item) {
				return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
			})->rawColumns(['img'])
			->toJson();
    }

    public function getform($id = null)
   	{
   		$news = News::find($id);
        if (!$news) $news = [];

        return view('backend.news.form', [
            'news' => $news,
            'id' => $id
        ]);
   	}

   	public function postform($id = null) 
   	{       
        $data = request()->validate([
            'title_ru'       => 'required|max:255',
            'title_uz'       => 'nullable|max:255',
            'title_en'       => 'nullable|max:255',
            'short_text_ru'  => 'required|max:255',
            'short_text_uz'  => 'nullable|max:255',
            'short_text_en'  => 'nullable|max:255',                     
            'text_ru'        => 'required',
            'text_uz'        => 'nullable',
            'text_en'  	     => 'nullable',
            'type'           => 'required',
            'published_at'   => 'required|date',
            'img'            => 'nullable|mimes:jpg,jpeg,png|max:50000'
        ]);

   		if ($id == null) {
   			$news = News::create($data);
   			session()->flash('success', trans('alert.success.insert'));
   		} else {
            $news = News::find($id);
            $news->update($data);
            session()->flash('success', trans('alert.success.update'));            
		}
		
		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('news/'.$news->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$news->update($data);

   		return redirect()->route('backend.news.show');
   	}

    public function delete()
    {
        if (request()->has('id')) {
			$item = News::find(request()->input('id'));
			$image = public_path('storage/'.$item->img);
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();            
            $response = [
                'status' => 'success',
                'message' => trans('news sucessfully removed!')
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
