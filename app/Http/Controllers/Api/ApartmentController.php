<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Floor;

class ApartmentController extends Controller
{

    public function index($id)
    {
        $block = Floor::findOrFail($id);
        $apartments = Apartment::where('floor_id', $id)->get();
        if ($apartments != null) {
            return response()->make(['apartments' => $apartments]);
        } else {
            return abort(404);
        }  
    }
}
