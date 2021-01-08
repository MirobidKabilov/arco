<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\News;
use App\Models\Page;
use App\Models\Gallery;
use Telegram;
use Carbon\Carbon;

class PageController extends Controller
{
    public function index()
    {   
        $news = News::latest()->limit(4)->where('published_at', '<=', Carbon::now())->get();

        return view('frontend.page.index', compact('news'));
    }

    public function contact()
    {
        return view('frontend.page.contact');
	}
	
	public function contactForm()
	{
		$data = request()->validate([
			'name' => 'required|max:191',
			'phone' => 'required|max:191',
			'message' => 'required'
		]);

		$feedback = Feedback::create($data);
		$text = "Обратный звонок с сайта <a href='http://arcobuilding.uz'>arcobuilding.uz</a> \n"
                . "<b>Имя:</b> {$feedback->name}\n"
                . "<b>Номер телефона:</b> {$feedback->phone}\n"     
                . "<b>Сообщение:</b> {$feedback->message}\n";
                        
            Telegram::sendMessage([
                'chat_id' => -412682829,
                'text' => $text,     
                'parse_mode' => 'HTML'
			]);
		session()->flash('success_contact', __('main.contact.success'));	
		return redirect()->back();
	}

	public function show($alias)
	{
		$item = Page::where('alias', $alias)->first();

		if(!$item) {
			return abort(404);
		}

		return view('frontend.page.show', compact('item'));
	}

	public function gallery()
	{
		$items = Gallery::latest()->get();

		return view('frontend.page.gallery', compact('items'));
	}
}
