<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        foreach (['User','Category','CulinaryPlace','Review','Reservation','Favorite'] as $entity) {
            $this->app->bind("App\\Contracts\\Repositories\\{$entity}RepositoryInterface", "App\\Repositories\\Eloquent\\{$entity}Repository");
        }
    }
}
