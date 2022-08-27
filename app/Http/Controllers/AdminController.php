<?php

namespace App\Http\Controllers;

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

    public function table($nameTable)
    {
        $nameColumn = Schema::getColumnListing($nameTable);
        $table = DB::table($nameTable)->paginate(20);

        return view('admin/table', ['nameColumn' => $nameColumn, 'table' => $table]);
    }
}
