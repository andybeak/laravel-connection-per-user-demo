<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Auth;

class SwapDatabaseConnection
{
    /**
     * The name of the admin role
     */
    const ADMIN_ROLE = 'Admin';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!is_null($request->user()) && $request->user()->hasRole(self::ADMIN_ROLE)) {
            Log::debug("Swapping to admin connection");
            // change database connection to admin set up at src/config/database.php:38
            config(['database.default' => 'admin']);
        } else {
            Log::debug("Using standard connection (this should be default behavour)");
            // retain database connection to normal user set up at src/config/database.php:58
            config(['database.default' => 'standard']);
        }
        return $next($request);
    }
}
