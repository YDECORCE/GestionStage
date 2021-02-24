<?php

namespace App\Http\Controllers\Auth;

use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = ('/');


    protected function authenticated(Request $request, $user) {
        if ($user->role === 'ADMIN') {
            return redirect()->route('admins.index');
        } else if ($user->role === 'USER') {
            $trainee=Trainee::where('user_id',$user->id)->first();
            
            return redirect()->route('trainees.show',$trainee->id);
        } else {
            return redirect('/');
        }
   }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
