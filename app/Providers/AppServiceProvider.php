<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

use Schema;

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
        //
        // $profiles = DB::table('profiles')
        //   ->join('users', 'users.id', '=', 'profiles.user_id')
        //   ->where('users.id', '=', Auth::user()->id)
        //   ->get();
        //
        //   $subjects = Subject::where('classID', 'like',  '%' . $profiles[0]->classID .'%')
        //                  ->get();
        //   View::share('profiles', $profiles);
        Schema::defaultStringLength(191);
    }
}
