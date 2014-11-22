<?php

class LoginController extends \BaseController {

    public function loginForm()
    {
        return View::make('auth.login');
    }

    public function login()
    {
        $auth = Auth::attempt([
            'username' => Input::get('username'),
            'password' => Input::get('password')
        ]);

        if($auth) {
            return Redirect::intended('/');
        }

    }

    public function logout()
    {
        Auth::logout();

        return Redirect::intended('/');
    }
}