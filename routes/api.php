<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Data;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users', function () {
    $users = DB::table('data')->orderBy('id', 'desc')->limit(10)
        ->get()->reverse();
    $pas = [];
    $is = 0;
    foreach ($users as $key => $value) {
        $pas[$is]=$value;
        $is++;
    }
    // dd($pas);
    return response(
        [
            'pesan' => 'berhasil',
            'data' => $pas,
        ],
        200
    );
});
Route::get('values/{val}', function ($val) {
    Data::create([
        "value" => $val
    ]);
    return response("Berhasil");
});
