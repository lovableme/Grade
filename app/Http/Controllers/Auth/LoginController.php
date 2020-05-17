<?php

namespace App\Http\Controllers\Auth;

use App\Events\DenounceTimeExpiredEvent;
use App\Http\Controllers\Controller;
use App\Expiration;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('guest:profs')->except('logout');
    //     $this->middleware('guest:web')->except('logout');
    }

    public function username()
    {
        return 'uni_num';
    }
    public function login(Request $request)
    {
        $exp = new Expiration();

        $arrayOfE = $exp->checkExpiration();
        foreach($arrayOfE as $E){
            foreach ($E as $e) {
                $now = strtotime(now());
                if (strtotime($e[0]) + 3 * 24 * 3600 < $now) {
                    event(new DenounceTimeExpiredEvent($e));
                }
            }
        }

        $input = $request->all();

        $this->validate($request, [
            'uni_num' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('uni_num' => $input['uni_num'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_professor == 1) {
                return redirect('/profshome');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }

    }

    public function showstudentLoginForm()
    {
        return view('auth.login', ['url' => 'student']);
    }

    protected function guard()
    {
        return Auth::guard();
    }
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_admin == 1){
            return view('profshome');
        }
        return redirect('home');
    }


}
