<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        foreach ($prices as $price) {
            $date = new Carbon($price->created_at);
            $newDate = $date->isoFormat('YYYYMMDD');
            $data[] = ['x' => $newDate , 'y' => (int) $price->price];
        }
        $record = DB::table('source_data')->where('id', '=', $idSourceData)->first();

        return view('monitoring', [
            'idSourceData' => $idSourceData,
            'prices' => json_encode($data),
            'record' => $record
            ]);
    }

    public function delete($idSourceData)
    {
        DB::table('source_data')->where('id', '=', $idSourceData)->delete();
        DB::table('price_store')->where('idSourceData', '=', $idSourceData)->delete();

        return redirect(route('list'));
    }

    public function update(Request $request, $idSourceData)
    {
        DB::table('source_data')
            ->where('id', $idSourceData)
            ->update([
                'url' => $request->input('url'),
                'pattern' => $request->input('pattern'),
                'min_price' => $request->input('minPrice')
            ]);

        return redirect(route('monitoring', ['idSourceData' => $idSourceData]));
    }
}
