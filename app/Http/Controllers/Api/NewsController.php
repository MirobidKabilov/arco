<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all();
        return response()->make(['news' => $news]);
    }

    public function events()
    {
        $events = DB::table('news')->where('type', 'event')->get();
        return response()->make(['events' => $events]);
    }

}
