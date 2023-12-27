<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\SuperAdmin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        // View::composer('*', function ($view) {
        //     if(Auth::guard('user')->check()) {
        //         $view->with('authUserData', User::where('id','=',auth()->guard('user')->id())->first());
        //     }        
        // });
        View::composer('*', function ($view) {
            $isSuperAdmin = Auth::guard('superadmin')->check();
            $isUser = Auth::guard('user')->check();
            if($isSuperAdmin) {
                $view->with('authUserData', SuperAdmin::where('id','=',auth()->guard('superadmin')->id())->first());
            }       
            if($isUser) {
                $view->with('authUserData', User::where('id','=',auth()->guard('user')->id())->first());
            } 
        });
    }
}
