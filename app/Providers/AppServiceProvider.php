<?php

namespace ITOportunidades\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('select_without_repeat',function($attribute,$value,$parameters,$validator){
        $resultado = true;
        
        for ($i = 0; $i < sizeof($value); ++$i) {
            if(in_array($value[$i],$parameters)){
                $resultado = false;
            }
        }
        
        return $resultado;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
