<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\setbinharian;
use App\Models\Action;
use App\Models\setbinbulan;
use App\Models\tobol;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    function show()
    {
        $data = setbinharian::all()->reverse();
        return view('welcome', ['datas' => $data]);
    }
    function csuga1()
    {
        $date = date('Y m d');



        $data = setbinharian::all()->reverse();
        // $bulan = setbinharian::where()
        return view('csuga1', ['datas' => $data]);
    }



    public function button(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $day = DB::table('tobols')
            ->where('created_at', 'like', '%' . $date . '%')
            ->first();
        if (!empty($day)) {
            DB::table('tobols')
                ->where('created_at', $day->created_at)
                ->update(['value' => ($day->value + 1)]);
        } else {
            tobol::create([
                "value" => 1,
            ]);
        }

        // dd(Action::where('name', 'pupuk')->first()->status);
        if (Action::where('name', 'pupuk')->first()->status == "OFF") {
            Action::where('name', 'pupuk')->update([

                'status' => "ON",
            ]);
        } else {
            Action::where('name', 'pupuk')->update([

                'status' => "OFF",
            ]);
        }


        sleep(5);

        if (Action::where('name', 'pupuk')->first()->status == "OFF") {
            Action::where('name', 'pupuk')->update([

                'status' => "ON",
            ]);
        } else {
            Action::where('name', 'pupuk')->update([

                'status' => "OFF",
            ]);
        }


        return redirect()->back()->with(['status' => 'success']);
    }
    public function pupuk()
    {
        $das = DB::table('actions')->where('name', 'pupuk')->first()->status;
        return \response(([$das]));
    }

    public function bulan()
    {
        $data = setbinbulan::orderBy('id', 'desc')->limit(4)->get()->reverse();
        $bulan = [];
        $val = [];
        foreach ($data as $key => $value) {
            $x = explode(' ', $value->created_at);
            $x = explode('-', $x[0]);
            $bulan[] = $x[1];
            $val[] = $value->value;
        }
        return response(['label' => $bulan, 'value' => $val], 200);
    }
    public function tobol()
    {
        $data = tobol::orderBy('id', 'desc')->limit(4)->get()->reverse();
        $hari = [];
        $val = [];
        foreach ($data as $key => $value) {
            $x = explode(' ', $value->created_at);
            $x = explode('-', $x[0]);
            $hari[] = $x[2];
            $val[] = $value->value;
        }
        // var_dump($hari);
        // die;
        return response(['label' => $hari, 'value' => $val], 200);
    }
}
