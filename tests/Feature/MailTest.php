<?php

namespace Tests\Feature;

use App\Mail\PriceDontMakingMail;
use App\Models\Price;
use App\Models\SourceData;
use App\Models\User;
use App\Mail\Notification;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_notification()
    {
        $user = User::factory()->make();
        $sourceData = SourceData::factory()->make();
        $price = 123123.1231;

        $sentMassage = Mail::to(env('MAIL_USERNAME'))->send(new Notification($user, $sourceData, $price));
        $this->assertInstanceOf('\Illuminate\Mail\SentMessage' ,$sentMassage);
    }

    public function test_PriceDontMakingMail()
    {
        $user = User::factory()->make();
        $user->email = env('MAIL_USERNAME');
        $sourceData = SourceData::factory()->make();

        $sentMassage = Mail::to(env('MAIL_USERNAME'))->send(new PriceDontMakingMail($user, $sourceData));
        $this->assertInstanceOf('\Illuminate\Mail\SentMessage' ,$sentMassage);
    }
}
