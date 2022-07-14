<?php

namespace App\Mail;

use App\Models\SourceData;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PriceDontMakingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $source_data;

    /**
     * Create a new message instance.
     * @param User $user
     * @param SourceData $source_data
     * @return void
     */
    public function __construct(User $user, SourceData $source_data)
    {
        $this->user = $user;
        $this->source_data = $source_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.priceDontMaking');
    }
}
