<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;

class BlockController extends Controller
{

    public function index()
    {
        $blocks = Block::all();
        return response()->make(['blocks' => $blocks]);
    }

}
