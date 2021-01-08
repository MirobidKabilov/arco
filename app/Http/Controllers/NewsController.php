<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('published_at', '<=', Carbon::now())->latest()->paginate(6);
        return view('frontend.news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrfail($id);
        return view('frontend.news.show', compact('news'));
    }
}
