<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'name',
        'pathImage'
    ];

    public function sourceData()
    {
        return $this->belongsTo(SourceData::class, 'idSourceData');
    }

    public function delete()
    {
        unlink($this->pathImage);
        return parent::delete();
    }
}
