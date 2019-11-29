<?php

namespace Tests\Feature\Auth;

use App\User;
use DB;
use Hash;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\Notifications\ResetPassword;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_receives_an_email_with_a_password_reset_link()
    {
        Notification::fake();
      
        $user = factory(User::class)->create();
      
        $response = $this->post('/password/email', [
            'email' => $user->email,
        ]);
        $token = DB::table('password_resets')->first();
        $this->assertNotNull($token);
        Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
            return Hash::check($notification->token, $token->token) === true;
        });
    }
}
