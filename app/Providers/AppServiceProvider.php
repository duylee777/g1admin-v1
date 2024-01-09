<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\SuperAdmin;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Paginator::useBootstrap();
        // if (env(key: 'APP_ENV') !=='local') {
        //     URL::forceScheme(scheme:'https');
        //   }
       
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(\Illuminate\Http\Request $request): void
    {
        if (!empty( env('NGROK_URL') ) && $request->server->has('HTTP_X_ORIGINAL_HOST')) {
            $this->app['url']->forceRootUrl(env('NGROK_URL'));
        }
        Schema::defaultStringLength(191);
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
