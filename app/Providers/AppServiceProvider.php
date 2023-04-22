<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
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
        Schema::defaultStringLength(191);
        
        Paginator::useBootstrap();

        Hash::extend('customHash', function ($password, $salt) {
        $saltedPassword = $password . $salt;
        $hash = hash_init('sha512');
        hash_update($hash, $saltedPassword);
        $digest = hash_final($hash, true);
      
        $hashResult = 0;
        for ($i = 0; $i < strlen($digest); $i++) {
          $char = ord($digest[$i]);
          $hashResult = (($hashResult << 5) - $hashResult) + $char;
          $hashResult &= 0xffffffff;
        }
      
        for ($i = 0; $i < 10000; $i++) {
          for ($j = 0; $j < strlen($digest); $j++) {
            $char = ord($digest[$j]);
            $hashResult = (($hashResult << 5) - $hashResult) + $char;
            $hashResult &= 0xffffffff;
      
            $hashResult = (($hashResult << 2) | ($hashResult >> 30)) ^ $char;
          }
        }
        
        return $hashResult;
        // echo $hashResult;
        });
    }
}
