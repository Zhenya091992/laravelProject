<?php

namespace App\Mail;

use App\Models\SourceData;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $source_data;

    public $price;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param SourceData $source_data
     * @param $price
     */
    public function __construct(User $user, SourceData $source_data, $price)
    {
        $this->user = $user;
        $this->source_data = $source_data;
        $this->price = $price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.notification');
    }
}
