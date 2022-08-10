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
use Illuminate\Support\Facades\Storage;

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
        $sourceData->image()->first()->delete();
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
        Storage::put($tempDir, $image);
        $pathImageComplit = Storage::path(
            $pathImage = 'images/products/' . $idSourceData . 'image.png'
        );

        $imagine = new Imagine();
        $size    = new Box(200, 200);
        $mode    = ImageInterface::THUMBNAIL_INSET;
        $imagine->open(Storage::path($tempDir))
            ->thumbnail($size, $mode)
            ->save('storage/' . $pathImage);

        $image = new Image();
        $image->idSourceData = $idSourceData;
        $image->name = $request->post('nameImage');
        $image->pathImage = $pathImage;
        $image->save();
        Storage::delete($tempDir);

        return redirect(route('monitoring', ['idSourceData' => $idSourceData]));
    }
}
