<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::route(['middleware' => ['web']]);

        Broadcast::auth('user.*.notifications', function ($user, $id) {
            return (int) $user->id === (int) $id;
        });
    }
}
