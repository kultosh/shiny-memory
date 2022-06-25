<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index() 
    {
        return view('admin/login');
    }

    /**
     * Login for the admin
     * @param Request $request
     * @return Renderable
     */
    public function logIn(LoginRequest $request)
    {
        try {
            $data = $request->validated();
            $credentials = [
                'email' => $data['email_login'],
                'password' => $data['password_login'],
            ];
            
            if(Auth::attempt($credentials))
            {
                // dd('login success');
                Session::flash('success_message', 'Login Success');
                return redirect()->route('dashboard');
            }
            else
            {
                // dd('wrong credentials');
                return redirect()->back()->with(['error_message' => 'Please enter correct credentials', 'auth_error' => '1']);
            }
        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->with(['error_message' => 'Something went wrong on login.', 'auth_error' => '1']);
        }   
    }

    /**
     * Logout for the login user
     * @return Renderable
     */
    public function logOut()
    {
        try {
            DB::beginTransaction();
            if(auth()->check())
            {
                session()->flush();
                Auth::logout();
                return redirect()->route('login');
            }
            DB::commit();
            return redirect()->route('login')->with('error_message', 'You are not logged in.');
        } catch (Exception $th) {

            DB::rollback();
            Session::flash('error_message',$th->getMessage());
            return redirect()->back();
            
        }      
    }
}
