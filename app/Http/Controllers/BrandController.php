<?php

namespace App\Http\Controllers;

use App\Http\Requests\CronReq;
use App\Http\Resources\BrandRes;
use App\Http\Resources\CronRes;
use App\Http\Resources\ModeliRes;
use App\Models\Brand;
use App\Models\Cron;
use App\Models\Modeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BrandController extends Controller
{


    public function index(Request $request)
    {
        $data = Brand::paginate(10);

        if (!empty($request->sort) && !empty($request->direction)) {
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






    public function brand_get()
    {
        //............ оновлення кожні 30 днів (+15 сек запаса) 
        $timer = (time() - 3600 * 24 * 30 + 15);

        // json-база
        $json = Cron::find($id = 1);

        if (empty($json->id)) {
            $new_json = ['id' => 1, 'time_create' => '0'];
            $json = Cron::firstOrCreate($new_json)->get();
        }

        if (!empty($json->time_create) && $json->time_create > $timer) {
            header('refresh:3; url=' . url('brand_json/1'));
            return 'До оновлення бази - ' . ($json->time_create - $timer) . ' сек';
            return redirect()->to('brand_json')->send();
        } else {
            $response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/getallmakes?format=json");

            // відкриваємо файл
            $filename = base_path('resources/views/json/brands.json');
            // кодуємо данні
            $somecontent = json_encode($response['Results'], 1);

            // Вначале давайте убедимся, что файл существует и доступен для записи.
            if (is_writable($filename)) {
                if (!$fp = fopen($filename, 'w+')) {
                    echo "Не могу открыть файл ($filename)";
                    exit;
                }
                // Не могу произвести запись в файл ($filename)
                if (fwrite($fp, $somecontent) === FALSE) {
                    echo "Не могу произвести запись в файл";
                    exit;
                }
                // Ура
                fclose($fp);
                $data = ['time_create' => time()];
                $json = $json->update($data);

                header('refresh:3; url=' . url('brand_get'));
                return "Записали " . count($response['Results']) . " бренд в файл";
            } else {
                echo "Файл недоступен для записи";
            }
            return '+';
        }
    }






    public function brand_json(Request $request)
    {

        $Cron = Cron::find($id = 1);

        if (empty($Cron->id)) {
            return 'Треба створити локальну базу брендів (в json). ';
            return redirect()->to('brand_get');
        }

        $Brand = Brand::where('time_refresh', '<=', $Cron->time_create);
        $array['countBrand'] = $Brand->count();

        $Json = json_decode(file_get_contents(base_path('resources/views/json/brands.json')), 1);
        $array['countJson'] = count($Json);

        // кількість записів за 1 раз 
        $array['count'] = (!empty($request->count) ? $request->count : 1);

        if ($array['countJson'] > $array['countBrand']) {
            // 800 = 1000 - 200
            $array['raznica'] = $array['countJson'] - $array['countBrand'];
            // 200
            $array['i_start'] = $array['countBrand'];

            // поправка, якщо менша кількість записів
            $array['i_realCount'] = ($array['raznica'] > $array['count'] ? $array['count'] : $array['raznica']);
            // 300 = 200 + 100
            $array['i_end'] = $array['i_start'] + $array['i_realCount'];
            // Відлік часу
            $start_time = microtime(true);

            // перебор
            $array['cnt_model'] = 0;
            for ($i = $array['i_start']; $i < $array['i_end']; $i++) {
                $data = [
                    'Make_ID'       => $Json[$i]['Make_ID'],
                    'Make_Name'     => $Json[$i]['Make_Name']
                ];

                $newBrand = Brand::firstOrCreate($data);
                $timerRefreshBrand = Brand::where('id', '=', $newBrand['id'])
                    ->update(['time_refresh' => $Cron->time_create]);

                $Modeli = Modeli::where('Make_ID', '=', $data['Make_ID']);

                $res = ModeliController::model_get($data['Make_ID']);
                foreach ($res as $asd) {
                    $array['cnt_model']++;
                    $json = Modeli::firstOrCreate($asd)
                    ->where('Make_ID', '=', $data['Make_ID'])
                    ->get();
                }
                // return ModeliRes::collection($json);
            }

            // підраховую швидкість
            $array['microtime'] = mb_substr((microtime(true) - $start_time), 0, 5) . ' secound';
            
            return $array;

        } else {
            return $array;
        }
    }



    public function ajax_brand(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = BrandRes::collection(Brand::select('*')
                ->where('Make_Name', 'like', '%' . $search . '%')
                ->get());
        }

        return response()->json($data);
    }
    
    
    public function ajax_model(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Brand::with('models')->select('*')
                ->where('Make_ID', '=', $search)
                ->get();
        }

        return response()->json($data);
    }


    
}
