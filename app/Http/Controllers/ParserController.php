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

        if ($value = $price->findPrice($request->post('url'), $request->post('pattern'))) {
            session()->forget(['url', 'price']);
            $request->session()->put(['url' => $request->post('url'), 'pattern' => $request->post('pattern')]);
            return redirect('/confirm/' . $value);
        } else {
            return redirect()->back();
        }
    }

    public function success(Request $request, $match)
    {
        if (DB::table('source_data')
            ->where(['idUser' => Auth::user()->id, 'url' => session()->get('url')], '=')->doesntExist()) {
            $record = new Record();
            $record->idUser = Auth::user()->id;
            $record->url = session()->get('url');
            $record->pattern = session()->get('pattern');
            $record->save();
        } else {
            $record = DB::table('source_data')
                ->where(['idUser' => Auth::user()->id, 'url' => session()->get('url')], '=')->first();
        }
        $price = new Price();
        $price->idSourceData = $record->id;
        $price->price = $match;
        $price->save();

        return redirect('/monitoring/' . $record->id);
    }
}
