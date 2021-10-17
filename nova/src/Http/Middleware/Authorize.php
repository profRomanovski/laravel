<?php

namespace Laravel\Nova\Http\Middleware;

use Laravel\Nova\Nova;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        if (auth()->user()->isAdmin()){
            return Nova::check($request) ? $next($request) : abort(403);
        }
        return abort(403);
    }
}
