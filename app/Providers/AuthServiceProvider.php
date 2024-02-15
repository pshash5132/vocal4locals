<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button belowssss to verify your email address.')
                ->action('Verify Email Address', $url)
                ->view('emails.verification', ['url' => $url, 'user' => $notifiable]);
        });

        ResetPassword::toMailUsing(function (User $user, string $token) {
            $url = env('APP_URL') .'reset-password'. $token;
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button belowssss to verify your email address.')
                ->action('Verify Email Address', $url)
                ->view('emails.password-reset', ['url' => $url, 'user' => $user]);
        });
    }
}