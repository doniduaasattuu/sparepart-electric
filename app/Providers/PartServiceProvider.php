<?php

namespace App\Providers;

use App\Services\Impl\PartServiceImpl;
use App\Services\Impl\UtilityServiceImpl;
use App\Services\PartService;
use App\Services\UtilityService;
use Illuminate\Support\ServiceProvider;

class PartServiceProvider extends ServiceProvider
{
    public array $singletons = [
        PartService::class => PartServiceImpl::class,
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
