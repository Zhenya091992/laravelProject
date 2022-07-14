<?php

namespace App\Jobs;

use App\Mail\PriceDontMakingMail;
use App\Mail\Notification;
use App\Models\SourceData;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PriceDontMakingNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    protected $source_data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, SourceData $source_data)
    {
        $this->user = $user;
        $this->source_data = $source_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new PriceDontMakingMail($this->user, $this->source_data));
    }
}
