<?php

namespace App\Services;

use App\Contracts\GetColumnListingContract;
use \Illuminate\Database\Schema\Grammars\MySqlGrammar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GetColumnListing implements GetColumnListingContract
{
    public function getColumnListing($nameTable)
    {
        return $columns  = Schema::getColumnListing($nameTable);
    }
}
