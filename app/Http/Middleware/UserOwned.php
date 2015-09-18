<?php

namespace App\Http\Middleware;

Use Auth;
use App\Tweet;
use App\Reply;
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
        
        if ($request->segment(1) == "tweets")
        {
          $item = Tweet::find($request->segment(2));
        }  else {
          $item = Reply::find($request->segment(2));
        }

        if ($item->user_id !== Auth::id())
        {
            return response('Unauthorized.', 401);
        }

          return $next($request);
      }
}
