<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceData extends Model
{
    use HasFactory;

    protected $table = 'source_data';

    protected $fillable = [
        'url',
        'pattern',
        'min_price'
    ];

    public function comparePrice($price)
    {
        return $this->min_price > $price;
    }

    public function makeDataForGraph()
    {
        foreach ($this->price()->get() as $price) {
            $datePrice = new Carbon($price->created_at);
            $editedDate = $datePrice->isoFormat('YYYY MM DD');
            $data['x'][] = $editedDate;
            $data['y'][] = (float) $price->price;
        }

        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function price()
    {
        return $this->hasMany(Price::class, 'idSourceData');
    }
}
