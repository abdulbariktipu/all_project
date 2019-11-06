<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        //dd($user);
        $gate->define('isSuperAdmin', function($userType){
            //dd($userType); // show Login user
            return $userType->user_type == 'super_admin';
            // return $userTypeObject->Table_attribute == "field_value";
        });

        $gate->define('isAdmin', function($userType){
            return $userType->user_type == 'admin';
        });

        $gate->define('isUser', function($userType){
            return $userType->user_type == 'member';
        });
    }
}
