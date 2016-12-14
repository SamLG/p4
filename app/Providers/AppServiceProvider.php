<?php

namespace P4\Providers;

use Illuminate\Support\ServiceProvider;
use P4\Garden;
use P4\User;
use Auth;
use P4\Providers\Validator;
// use P4\Http\Controllers\Auth;
// use Illuminate\Http\Request;
// use App\Http\Requests;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // $gardens = Garden::all();
        // return view('home.index')->with(['gardens'=>$gardens]);

        // https://laracasts.com/series/laravel-5-fundamentals/episodes/25
        view()->composer('layouts.master', function($view)
        {
            // $user = $request->user();
            //
            // # Note: We're getting the user from the request, but you can also get it like this:
            $user = Auth::user();

            if($user) {
                # Approach 1)
                //$books = Book::where('user_id', '=', $user->id)->orderBy('id','DESC')->get();

                # Approach 2) Take advantage of Model relationships
                $gardens = $user->gardens()->get();
            }
            else {
                $gardens = [];
            }

            $view->with(['gardens'=>$gardens]);
        });

        //create custom validation rule
        $this->app['validator']->extend('zone_check', function($field,$value,$parameters,$validator){
            //grab min and max zones out of parameters array
            $min = array_get($validator->getData(), $parameters[0]);
            $max = array_get($validator->getData(), $parameters[1]);
            // if either parameter is not input, then validates true
            if ($min == '' || $max == '') {
                return true;
            }
            // otherwise need to check
            else {
                // get just the letter part of zone
                $min_alph = substr($min, -1);
                // get the numeric part of zone
                $min_num = chop($min,$min_alph);
                $max_alph = substr($max, -1);
                $max_num = chop($max,$max_alph);

                // the minimum zone can never be greater than the maximum zone
                if ($min_num > $max_num) {
                    return false;
                }
                // if the zones are the same and min is a, max needs to be b
                elseif ($min_num == $max_num && $min_alph == 'b' && $max_alph == 'a') {
                    return false;
                }
                // otherwise min is < max because the min_num <= max_num && $min_alph<=$max_alph when appropriate
                else {
                    return true;
                }
            }
            //return false if $min is >= $max
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
