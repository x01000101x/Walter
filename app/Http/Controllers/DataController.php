<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    function show()
    {
        $data = Data::all();
        return view('welcome', ['datas' => $data]);
    }
}
