<?php

namespace App\Providers;

use IamPln\SsoAuthServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends SsoAuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $abilities) {

            $abilities = self::tryParseAbility($abilities);

            if(config("auth.authz")){
                $permissions = json_decode($user->groupPermission->permissions);

                $result = count(array_intersect($abilities, $permissions)) > 0;

                if($result) return true; //don't return false

            }else return true;
        });

        if(config("auth.sso")) parent::boot();
    }

    private function tryParseAbility($string){
        try {
            $decodeResult = json_decode($string);
            if(is_array($decodeResult)){
                $result = json_decode($string);
            }else $result = array($string);
        }
        catch (\Exception $e) {
            return array();
        }

        return $result;
    }
}
