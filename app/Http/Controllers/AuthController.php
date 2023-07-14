<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        // define previous url(come form /nearest-workshop this url)
        //$define_previous_url = $request->define_previous_url;

        // check user location found or not
        //$lat = Session::get('lat');
        //$lng = Session::get('lng');



        if ($request->isMethod('POST')) {

            //dd($request->all());
            $request->validate([
                'email' => ['required'],
                //'phone_number' => ['required'],
                'password' => ['required'],
            ]);

            $withEmail = ['email' => $request->email, 'password' => $request->password];
            $withPhoneNumber = ['phone_number' => $request->phone_number, 'password' => $request->password];

            if (Auth::attempt($withEmail) || Auth::attempt($withPhoneNumber)) {

                $request->session()->regenerate();

                // Redirect to /nearest-workshop
                /*if ($define_previous_url == route('nearest.workshop')) {
                    notify()->success("Welcome to our Service", "Success");
                    return redirect()->intended('nearest-workshop');
                }*/

                notify()->success("Welcome To Water Testing Software", "Success");
                return redirect()->intended('home');

                /*// check user location found or not
                if(isset($lng) && isset($lng)){
                    return redirect()->intended('nearest-workshop');
                }
                return redirect()->intended('home');*/
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                //'phone_number' => 'The provided credentials do not match our records.',
            ]);
        }

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
