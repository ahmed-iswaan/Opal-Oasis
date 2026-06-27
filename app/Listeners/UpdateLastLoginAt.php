<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Carbon;

class UpdateLastLoginAt
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;

        if (!method_exists($user, 'forceFill')) {
            return;
        }

        // Only update if the attribute exists on the model/table.
        if (!array_key_exists('last_login_at', $user->getAttributes())) {
            // If model hasn't loaded attributes yet, try setting anyway (will fail if column missing).
            try {
                $user->forceFill(['last_login_at' => Carbon::now()])->save();
            } catch (\Throwable) {
                // ignore
            }

            return;
        }

        $user->forceFill(['last_login_at' => Carbon::now()])->save();
    }
}
