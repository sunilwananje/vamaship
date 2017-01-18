<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Input,Validator,Auth,Session;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
    public function postLogin(){

            $data = array('username' => Input::get('username'), 'password' => Input::get('password'));
            $valid = Validator::make($data, ['username' => 'required', 'password' => 'required' ]);
            if ($valid->fails()) {
	           return redirect('/')->withErrors($valid);
	        }else{
	            if (Auth::attempt($data)) {
	                return redirect('dashboard');
	            }else{
	            	 $error = "Invalid username and password!";
	               Session::flash('error',$error);
	                return redirect('/login');
	            } 
	            
	               
	  
	         }
         
        
    }
    
    public function getLogout(){
    	Auth::logout();
    	return redirect('/login');
    }
    
}
