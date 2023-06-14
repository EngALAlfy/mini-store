<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Installed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (
                DB::getDatabaseName() == config('database.connections.mysql.database') &&
                Schema::hasTable('migrations')
                && User::count() > 0
            ) {
                // true installed
            } else {
                return redirect()->route('install');
            }
        } catch (Exception $e) {
            return  redirect()->route('install');
        }

        return $next($request);
    }
}
