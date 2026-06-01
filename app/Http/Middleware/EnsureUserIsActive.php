<?php
namespace App\Http\Middleware;
use Closure;use Illuminate\Http\Request;
class EnsureUserIsActive{public function handle(Request $request, Closure $next){abort_if($request->user()?->status==='suspended',403,'User suspended.');return $next($request);}}
