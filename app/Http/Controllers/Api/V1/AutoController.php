<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutoReq;
use App\Http\Resources\AutoRes;
use App\Models\Auto;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\Input;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AutoRes::collection(Auto::all());
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutoReq $request)
    {
        $response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/" . $request->vin . "?format=json");
        $i=0;
        $AddArray = array();

        // Парсимо додаткові данні по VIN-коду
        foreach($response['Results'] as $Result){
            if($Result['Variable']=='Make') $AddArray['brand'] = $Result['Value'];
            if($Result['Variable']=='Model') $AddArray['model'] = $Result['Value'];
            if($Result['Variable']=='Model Year') $AddArray['year'] = $Result['Value'];

            $i++;
            if($i>15) break;
        }

        $create_auto = Auto::firstOrCreate($request->validated() + $AddArray);

        return new AutoRes($create_auto);
        // return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new AutoRes(Auto::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutoReq $request, Auto $auto)
    {
       $auto->update($request->validated());
       
       return new AutoRes($auto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        $auto->delete();
        return back()->withInput();
    }
}
