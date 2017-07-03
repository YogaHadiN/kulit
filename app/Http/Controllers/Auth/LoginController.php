<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use App\Yoga;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $social = Socialite::driver('facebook')->user();

		if ( $social->user['gender'] == 'male') {
			$gender = 1;
		} else {
			$gender = 0;
		}

		try {
			$user = User::where('email', $social->getEmail())->firstOrFail();
			$user->avatar = $social->getAvatar();
			$user->save();

		} catch (\Exception $e) {
			$user           = new User;
			$user->name     = $social->getName();
			$user->email    = $social->getEmail();
			$user->avatar   = $social->getAvatar();
			$user->gender   = $gender;
			$user->password = bcrypt('secret');
			$user->save();
		}
		Auth::login($user);

		$pesan = Yoga::suksesFlash('Halo ' . $social->getName() . ', Anda berhasil Login');
		return redirect('home')->withPesan($pesan);
    }
}
