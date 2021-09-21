<?php

namespace App\Providers;

use App\Contracts\Gampe\NotifyTicketRepository;
use App\Repositories\Gampe\NotifyTicketChangeEventRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NotifyTicketRepository::class, NotifyTicketChangeEventRepository::class);
    }
}
