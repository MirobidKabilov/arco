<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{

    public function index()
    {
        $partners = Partner::all();
        return response()->make(['partners' => $partners]);
    }

}
