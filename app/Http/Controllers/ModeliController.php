<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModeliRes;
use App\Models\Modeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModeliController extends Controller
{


    public function index(Request $request)
    {

        // Modeli
        if (!empty($request->Make_ID)) {
            $data = Modeli::sortable(['id' => 'ASC'])
                ->where('Make_ID', '=', $request->Make_ID);
            $appends['Make_ID'] = $request->Make_ID;
        } else {
            $data = Modeli::sortable(['id' => 'ASC']);
        }

        $data = $data->paginate(10);

        if (!empty($request->sort) && !empty($request->direction)) {
            $appends['sort'] = $request->sort;
            $appends['direction'] = $request->direction;
            $data->appends($appends);
        }
        return view('model', ['data' => $data]);
    }






    public function model_get($Make_ID)
    {
        $response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/getmodelsformakeid/" . $Make_ID . "?format=json");

        return $response['Results'];
    }
}
