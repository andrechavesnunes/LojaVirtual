<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 05/09/2016
 * Time: 23:08
 */

namespace CodeProject\OAuth;


use Illuminate\Support\Facades\Auth;

class Verifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}