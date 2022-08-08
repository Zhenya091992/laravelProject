<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Imagine\Imagick\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use App\Http\Requests\AddImageRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Http;

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
            'priceOsX' => json_encode($sourceData->makeDataForGraph()['x']),
            'priceOsY' => json_encode($sourceData->makeDataForGraph()['y']),
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

    public function addImage(AddImageRequest $request, $idSourceData)
    {
        $tempDir = 'tempFiles/tempImg' . $idSourceData;
        $image = file_get_contents($request->post('urlImage'));
        $file = file_put_contents($tempDir, $image);
        $pathImageComplit = 'image/products/' . $idSourceData . 'image.png';
        $imagine = new Imagine();
        $size    = new Box(100, 100);
        $mode    = ImageInterface::THUMBNAIL_INSET;
        $imagine->open($tempDir)
            ->thumbnail($size, $mode)
            ->save($pathImageComplit);

        $image = new Image();
        $image->idSourceData = $idSourceData;
        $image->name = 'image';
        $image->pathImage = $pathImageComplit;
        $image->save();
        unlink($tempDir);

        return redirect(route('monitoring', ['idSourceData' => $idSourceData]));
    }
}
