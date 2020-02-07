<?php

namespace App\Providers;

use App\Models\User2;
use IamPln\SsoAppServiceProvider;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class AppServiceProvider extends SsoAppServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('component.icon', 'icon');
        if(config("auth.sso")) {
            parent::boot();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(config("auth.sso")){
            parent::register();
        }
    }

    public function findUser(string $identifier): Authenticatable{
        $username = strtoupper($identifier);

        $user = User2::where('user_pickname', $username)->first();

        if($user == null){
            throw new AuthenticationException("Username lokal '" . $username . "' tidak ditemukan! Silakan hubungi administrator sistem.");
        }

        return $user;
    }
}
