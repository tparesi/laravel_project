<?php

namespace App\Http\Middleware;

Use Auth;
use App\Tweet;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class UserOwned
{
     /**
      * The Guard implementation.
      *
      * @var Guard
      */
     protected $auth;

     /**
      * Create a new filter instance.
      *
      * @param  Guard  $auth
      * @return void
      */
     public function __construct(Guard $auth)
     {
         $this->auth = $auth;
     }

     /**
      * Handle an incoming request.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \Closure  $next
      * @return mixed
      */

      public function handle($request, Closure $next)
      {

        $tweet = Tweet::find($request->segment(2));

        if ($tweet->user_id !== Auth::id())
        {
            return response('Unauthorized.', 401);
        }

          return $next($request);
      }
}
