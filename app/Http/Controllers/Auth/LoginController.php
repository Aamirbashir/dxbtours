<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

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
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
public function logout()
    {
        Auth::logout();

    return redirect(route('admin.login'));
}
    public function login(Request $request){
        $data = $request->all();

        $rules = [
            "email" => "required|email|max:255",
            "password" => "required",
        ];

        $validate = Validator::make($data, $rules);

        if ($validate->fails()) {
            return response()->json(["status"=>"Error", "errors"=>$validate->errors()->toArray()]);
        }

        $user = User::whereEmail($data['email'])->wherePassword(md5($data['password']))->active()->first();
        
        if($user){
            $user = Auth::loginUsingId($user->id);
            return response()->json(["status"=>"Success", "html"=>"Login Successfully.", "action" => "login"]);
        }
        else {
            $messageBag = new MessageBag;
            $messageBag->add('email', 'The given credientials are not correct.');
            return response()->json(["status"=>"Error", "errors"=>$messageBag->toArray()]);
        }

    }

}
