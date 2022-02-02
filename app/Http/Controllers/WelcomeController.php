<?php

namespace App\Http\Controllers;


use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class WelcomeController extends Controller
{


    public function AutoNameArray()
    {
        return [
            'name' => 'Ім\'я',
            'gos_nomer' => 'Держ номер',
            'color' => 'Колір',
            'vin' => 'VIN',
            'brand' => 'Марка',
            'model' => 'Модель',
            'year' => 'Рік'
        ];
    }


    /*
    *
    */


    public function index()
    {
        $AllUsers = Auto::all();
        return view('index');
    }


    public function new()
    {
        return view('new');
    }


    public function list()
    {
        $list = Auto::sortable(['id' => 'ASC'])->paginate(5);
        return view('list', compact('list'));
    }




    public function auto_red_form($id)
    {
        $data = Auto::find($id);
        $AutoNameArray = WelcomeController::AutoNameArray();
        // Всі поля

        return view('auto_red_form', ['data' => $data, 'AutoNameArray' => $AutoNameArray]);
    }


    public function auto_update($id, Request $request)
    {
        
        $data = Auto::find($id);
        $AutoNameArray = WelcomeController::AutoNameArray();

        foreach ($AutoNameArray as $key => $value) {
            $data->$key = $request->input($key);
        }

        $data->save();

        return back()->withInput()->with('success', 'Сохранено');
    }







    public function list_search(Request $request)
    {
        $list = Auto::sortable(['id' => 'ASC'])->where(function ($list) {
            global $request;
            $list->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('gos_nomer', 'like', '%' . $request->search . '%')
                ->orWhere('vin', 'like', '%' . $request->search . '%');
        });

        $sortLike = ['name', 'gos_nomer', 'vin'];
        $i = 0; {
            $i++;


            // Удаляю Марку
            if (!empty($request->unsort_brand)) {
                $list = $list->whereNotIn('brand', [$request->unsort_brand]);
                $array_appends['unsort_brand'] = $request->unsort_brand;
            }
            // Удаляю Модель
            if (!empty($request->unsort_model)) {
                $list = $list->whereNotIn('model', [$request->unsort_model]);
                $array_appends['unsort_model'] = $request->unsort_model;
            }
            // Удаляю Год
            if (!empty($request->unsort_year)) {
                $list = $list->where('year', '!=', $request->unsort_year);
                $array_appends['unsort_year'] = $request->unsort_year;
            }
        }

        // Всі параметри GET-запроса
        $array_appends['search'] = $request->search;
        if (!empty($request->sort)) $array_appends['sort'] = $request->sort;
        if (!empty($request->direction)) $array_appends['direction'] = $request->direction;



        if (!empty($request->export_xls)) {
            // Експортирую страницу в XLS
            if ($request->export_xls == 'page') $list = $list->paginate(10);
            print view('export', compact('list'));
            return back()->withInput();
        } else {
            // Сортировка
            $list = $list->paginate(10);
            $list->appends($array_appends);
            $go_xls = $go_xls = 1;
            return view('list', compact('list','go_xls'));
        }
    }



    # Пошук
    public function search(Request $request)
    {
        return view('search');
    }
}
