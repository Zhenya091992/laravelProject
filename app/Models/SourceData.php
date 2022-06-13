<?php

namespace App\Models;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function price()
    {
        return $this->hasMany(Price::class, 'idSourceData');
    }
}
