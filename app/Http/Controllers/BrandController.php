<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BrandController extends Controller
{


    public function index(Request $request)
    {
        $data = Brand::sortable(['id' => 'ASC'])->paginate(10);

        if(!empty($request->sort) && !empty($request->direction)){
            $appends['sort'] = $request->sort;
            $appends['direction'] = $request->direction;
            $data->appends($appends);
        }

        return view('brand-all', ['data' => $data]);
    }


    public function brand_search()
    {
        return view('brand-search');
    }




    public function brand_export()
    {
        $response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/getallmakes?format=json");

        return $response;

        return $response;
        $req = array();
        $i = 0;
        foreach ($response['Results'] as $req) {
            $i++;
            $data['name'] = $req['Make_Name'];
            $data['creator_id'] = $req['Make_ID'];

            $create = Brand::firstOrCreate($data);
            if ($i == 5) break;
        }
        return back()->withInput()->with('success', 'Сохранено');
    }



    public function brand_ajax_search(Request $request)
    {
        $movies = [];

        if ($request->has('q')) {
            $search = $request->q;
            $movies = Brand::with('models')->select('*')
                ->where('name', 'like', '%' . $search . '%')
                ->get();
        }

        return response()->json($movies);
    }
}
