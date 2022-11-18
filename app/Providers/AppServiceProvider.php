<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Client;
use App\Models\User;
use App\Models\Project;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $clients = Client::active()->orderBy('id','desc')->get();
        view()->share('clients', $clients);

        $employees = User::where('role','employee')->orderBy('id','desc')->get();
        view()->share('employees', $employees);

        $projects = Project::active()->orderBy('id','desc')->get();
        view()->share('projects', $projects);
    }
}
