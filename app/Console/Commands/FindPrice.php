<?php

namespace App\Console\Commands;

use App\Jobs\SendMail;
use App\Mail\Notification;
use App\Models\Price;
use App\Models\User;
use App\Models\SourceData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class FindPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:FindPrice';

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
        foreach (SourceData::all() as $sourceData ) {
            $price = new Price();
            if ($price->price = $price->findPrice($sourceData->url, $sourceData->pattern)) {
                $price->idSourceData = $sourceData->id;
                $price->save();

                $user = User::find($sourceData->idUser);

                if ($sourceData->comparePrice($price->price)) {
                    SendMail::dispatch($user, $sourceData, $price->price);

                    $sourceData->min_price = $price->price;
                    $sourceData->save();
                }
            } else {
                \Log::error("Price dont making!!!");
            }
        }
    }
}
