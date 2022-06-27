<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function list()
    {
        $records = Auth::user()->sourceData()->get();
        return view('list', ['list' => $records]);
    }

    public function monitoring($idSourceData)
    {
        $sourceData = Auth::user()->sourceData()->find($idSourceData);

        return view('monitoring', [
            'idSourceData' => $idSourceData,
            'prices' => json_encode($sourceData->makeDataForGraph()),
            'record' => $sourceData
            ]);
    }

    public function delete($idSourceData)
    {
        $sourceData = Auth::user()->sourceData()->find($idSourceData);
        $sourceData->price()->delete();
        $sourceData->delete();

        return redirect(route('list'));
    }

    public function update(Request $request, $idSourceData)
    {
        Auth::user()->sourceData()->find($idSourceData)->update([
            'url' => $request->post('url'),
            'pattern' => $request->post('pattern'),
            'min_price' => $request->post('minPrice')
        ]);

        return redirect(route('monitoring', ['idSourceData' => $idSourceData]));
    }
}
