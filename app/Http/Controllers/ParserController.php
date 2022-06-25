<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\SourceData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParserController extends Controller
{
    public function parsing(Request $request)
    {
        $price = new Price();
        $price->url = $request->post('url');
        $price->pattern = $request->post('pattern');
        $request->session()
            ->put(['urlPattern' => $request->post('url'), 'pattern' => $request->post('pattern')]);
        $value = $price->findPrice($request->post('url'), $request->post('pattern'));
        if ($value) {
            return redirect('confirm/' . $value);
        } else {
            return redirect()->back();
        }
    }

    public function success($match)
    {
        $record = new SourceData();
        $record->idUser = Auth::user()->id;
        $record->url = session()->get('urlPattern');
        $record->pattern = session()->get('pattern');
        $record->min_price = $match;
        $record->save();

        $price = new Price();
        $price->idSourceData = $record->id;
        $price->price = $match;
        $price->save();

        return redirect('monitoring/' . $record->id);
    }
}
