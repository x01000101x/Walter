<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walter;
use Illuminate\Database\Eloquent\Model;

class ValueController extends Controller
{
    function show()
    {
        $data = Walter::all();
        return view('welcome', ['values' => $data]);
    }
}
