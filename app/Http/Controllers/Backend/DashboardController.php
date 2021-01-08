<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Apartment;
use App\Models\Application;

class DashboardController extends Controller
{
	public function index() 
	{
        $aparts = Apartment::all();
        $on_sale = Apartment::where('status', 0)->get();
        $sold = Apartment::where('status', 1)->get();
        $reserved = Apartment::where('status', 2)->get();
        return view('backend.pages.dashboard', [
            'aparts' => $aparts,
            'on_sale' => $on_sale,
            'sold' => $sold,
            'reserved' => $reserved
        ]);
    }
}

