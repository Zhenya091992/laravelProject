<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParserController extends Controller
{
    public function parse(Request $request)
    {
        $price = new Price();
        $price->url = $request->post('url');
        $price->pattern = $request->post('pattern');
        $request->session()
            ->put(['urlPattern' => $request->post('url'), 'pattern' => $request->post('pattern')]);
        if ($value = $price->findPrice($request->post('url'), $request->post('pattern'))) {
            return redirect('/confirm/' . $value);
        } else {
            return redirect()->back();
        }
    }

    public function success(Request $request, $match)
    {
        if (DB::table('source_data')
            ->where(['idUser' => Auth::user()->id, 'url' => session()->get('urlPattern')], '=')
            ->doesntExist()) {
            $record = new Record();
            $record->idUser = Auth::user()->id;
            $record->url = session()->get('urlPattern');
            $record->pattern = session()->get('pattern');
            $record->min_price = $match;
            $record->save();
        } else {
            $record = DB::table('source_data')
                ->where(['idUser' => Auth::user()->id, 'url' => session()->get('urlPattern')], '=')
                ->first();
        }
        $price = new Price();
        $price->idSourceData = $record->id;
        $price->price = $match;
        $price->save();

        return redirect('/monitoring/' . $record->id);
    }
}
