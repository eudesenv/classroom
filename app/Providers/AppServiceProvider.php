<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Code\Validator\Cpf;

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
        if($this->app->environment() !== 'production'){
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        \Validator::extend('cpf', function($attribute, $value, $parameters, $validator){
            return (new Cpf())->isValid($value);
        });
        
    }
}
