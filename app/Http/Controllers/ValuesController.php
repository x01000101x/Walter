<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Value;

class ValuesController extends Controller
{
    public function show()
    {
        $datas = Value::all();
        return View("welcome", ['values' => $datas]);
    }
}
