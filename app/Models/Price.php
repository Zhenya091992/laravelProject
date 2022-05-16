<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use simplehtmldom\HtmlWeb;

class Price extends Model
{
    use HasFactory;

    protected $table = 'price_store';

    public function findPrice($url, $pattern): string|false
    {
        $client = new HtmlWeb();
        $html = $client->load($url);
        if ($res = $html->find($pattern, 0)) {
            $res = $res->plaintext;
            $res = str_replace(' ', '', $res);
            preg_match_all('|[0-9]*[.,][0-9]+|', $res, $matches);

            return str_replace(',', '.', $matches[0][0]);
        } else {
            return false;
        }
    }
}
