<?php

namespace App\Http\Controllers;

use App\Models\SourceData;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Models\Price;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    use RefreshDatabase;

    public function test()
    {
        $sqlDump = Storage::disk('local')->get('backup-temp/mysql-Laravel.sql');
    }

}
