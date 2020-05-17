<?php
  
namespace App\Http\Middleware;
  
use Closure;
   
class IsStudent
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
        if(auth()->user()->is_professor == 0 && auth()->id()){
            return $next($request);
        }
   
        return redirect('profshome');
    }
}