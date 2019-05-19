<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Customer;
use App\CustomerProfile;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('/login/login');
    }

    public function checkLogin(Request $request)
    {
        $validateLoginForm = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if(Auth::attempt($validateLoginForm)){
            $customer = Customer::where('username', $validateLoginForm['username'])->first();
            return redirect()->action(
                'MainController@showHomePage', ['customerID' => $customer->id]
            );
        }
        else{
            return back()->with('error', 'Customer not found, Please Register first.');
        }
    }

    public function register()
    {
        return view('/login/register');
    }

    public function checkRegister(Request $request)
    {
        if (Customer::where('username', '=', $request->input('username'))->exists()) {
            return redirect('/register')->with('error', 'This Username is already use.');
        }else{
            $newCustomer = new Customer;    
            $newCustomer->username          = $request->input('username');
            $newCustomer->password          = Hash::make($request->input('password'));
            $newCustomer->type              = $request->input('customerType');
            $newCustomer->save();
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
