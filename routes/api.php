<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\setbinharian;

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
        $pas[$is] = $value;
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
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $day = DB::table('setbinharians')
        ->where('created_at', 'like', '%'.$date.'%')
        ->first();
    if (!empty($day)) {
        DB::table('setbinharians')
            ->where('created_at', $day->created_at)
            ->update(['value' => (($day->value+$val)/2)]);
    } else {
        setbinharian::create([
            "value" => $val
        ]);
    }
    $day = DB::table('setbinharians')
        ->where('created_at', 'like','%'. $date.'%')
        ->first();
    // dd($day);
    return response("Berhasil");
});
