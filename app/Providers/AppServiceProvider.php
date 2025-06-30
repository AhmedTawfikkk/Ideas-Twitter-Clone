<?php

namespace App\Providers;

use App\Models\idea;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
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
        Paginator::useBootstrapFive();

        /*  Replaced by EnsureUserIsAdmin middleware
        Gate::define('admin',function(User $user){
            return $user->is_admin;
        });
        */

        /*  Replaced by Idea Policy
        Gate::define('idea.delete',function(User $user,idea $idea){
            return ($user->is_admin || $user->id === $idea->user_id);
        });
        Gate::define('idea.edit',function(User $user,idea $idea){
            return ($user->is_admin || $user->id === $idea->user_id);
        });
        */

        $topUsers = Cache::remember('topUsers', 60 * 2, function () {  //checks the cache driver to see if these top users exist and if does not exist it will run the closure and get the value and put it inside the cache
            return User::withCount('ideas')
                ->orderBy('ideas_count', 'desc')
                ->limit(5)->get();
        });

        View::share('topUsers', $topUsers);
    }
}
