<?php

namespace App\Http\Controllers;

use App\Models\Modeli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ModeliController extends Controller
{
    public function index(Request $request)
    {
        $data = Modeli::paginate(10);

        if (!empty($request->sort) && !empty($request->direction)) {
            $appends['sort'] = $request->sort;
            $appends['direction'] = $request->direction;
            $data->appends($appends);
        }

        return view('model', ['data' => $data]);
    }
}
