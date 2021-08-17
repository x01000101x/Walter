<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ValuesController extends Controller
{
    public function show()
    {
        return View("welcome");
    }
}
