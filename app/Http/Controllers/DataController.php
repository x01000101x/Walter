<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\setbinharian;

class DataController extends Controller
{
    function show()
    {
        $data = setbinharian::all()->reverse();
        return view('welcome', ['datas' => $data]);
    }
    function csuga1()
    {
        $data = setbinharian::all()->reverse();
        return view('csuga1', ['datas' => $data]);
    }
}
