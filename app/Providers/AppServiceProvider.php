<?php

namespace App\Providers;

use App\Models\GroupChat;
use App\Models\Message;
use App\Models\MessageComment;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $messagessss= Message::all();

        View::share('messagessss',$messagessss);

        //$user= User::first();

        //View::share('user',$user);


        $grps = GroupChat::all();
        View::share('grps',$grps);

        
 
 

        

    }
}
