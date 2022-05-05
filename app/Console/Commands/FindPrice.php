<?php

namespace App\Console\Commands;

use App\Models\Price;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FindPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Создание новой команды.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     *
     */
    public function handle()
    {
        foreach (DB::table('source_data')->get() as $sourceData) {
            $price = new Price();
            if ($price->price = $price->findPrice($sourceData->url, $sourceData->pattern)) {
                $price->idSourceData = $sourceData->id;
                $price->save();
            } else {
                \Log::error("Price dont making!!!");
            }
        }
    }
}
