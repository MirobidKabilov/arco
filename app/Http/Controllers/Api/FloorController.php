<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\Block;

class FloorController extends Controller
{

    public function index($id)
    {
        $block = Block::findOrFail($id);
        $floors = Floor::where('block_id', $id)->get();

        if ($floors != null) {
            return response()->make(['floors' => $floors]);
        } else {
            return abort(404);
        }
    }

}
