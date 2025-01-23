<?php

namespace App\Providers;

use App\Models\Client;
use Illuminate\Support\ServiceProvider;

class ClientsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         Client::firstOr(function () {
            return Client::create([
                'link' => '',
                'logo' => '',

            ]);
        });


    }
}
