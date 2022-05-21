<?php

namespace App\Models;

use DOMDocument;
use DOMXPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use simplehtmldom\HtmlWeb;

class Price extends Model
{
    use HasFactory;

    protected $table = 'price_store';

    public function findPrice($url, $pattern): string|false
    {
        $data = file_get_contents($url);
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($data);
        $domXpath = new DOMXPath($dom);
        $query = $domXpath->query($pattern);
        foreach ($query as $node) {
            $res = $node->nodeValue;
        }
        $res = str_replace(' ', '', $res);
        preg_match_all('|[0-9]*[.,]{0,1}[0-9]+|', $res, $matches);

        return str_replace(',', '.', $matches[0][0]);
    }
}
