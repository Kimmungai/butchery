<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);//for mysql to  work

      ##get shopping cart content#
      session(['shoppingCart' => []]);
      session(['shoppingCartTotal' => '']);
      session(['selectedSupermarket' => 1]);//the first supermarket is default
      ##end get shopping cart content#
    }
}
