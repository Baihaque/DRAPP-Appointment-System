<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Doctor;
class ActiveDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $credential = $request->only('email', 'password');
        //dd($request);
        if((Auth::guard('doctor')->attempt(['email' => $credential['email'], 'password' => $credential['password'],'status'=>0]))){
            session()->flush();
            return redirect('/doctor/login')->withErrors('Please Contact Administrator');
        }
        return $next($request);
    }
}
