<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function list()
    {
        $records = DB::table('source_data')->where('idUser', '=', Auth::user()->id)->get();
        return view('list', ['list' => $records]);
    }

    public function monitoring($idSourceData)
    {
        $prices = DB::table('price_store')
            ->where('idSourceData', '=', $idSourceData)
            ->get();
        return view('monitoring', ['prices' => $prices]);
    }
}
