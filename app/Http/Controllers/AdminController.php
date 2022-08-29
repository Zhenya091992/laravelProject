<?php

namespace App\Http\Controllers;

use App\Contracts\GetColumnListingContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function listTables()
    {
        $tables = Table::all();

        return view('admin/admin', ['tables' => $tables]);
    }

    public function table($nameTable, GetColumnListingContract $service)
    {
        $table = DB::table($nameTable)->get();
        $nameColumn = $service->getColumnListing($nameTable);

        return view('admin/table', ['nameColumn' => $nameColumn, 'table' => $table]);
    }
}
