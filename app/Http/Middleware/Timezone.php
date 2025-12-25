<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;

class Timezone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the setting value from the database
        $setting = Setting::first();

        // If the setting exists and has a valid timezone value
        if ($setting && !empty($setting->timezone)) {
            // Use the config function to set the timezone
            config(['app.timezone' => $setting->timezone]);

            // Set the default timezone for PHP
            date_default_timezone_set($setting->timezone);
        }

        return $next($request);
    }
}
