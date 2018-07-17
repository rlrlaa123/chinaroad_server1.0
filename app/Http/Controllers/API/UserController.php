<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
            'gender' => 'required',
            'registered' => 'required',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return response($validator->errors());
        }

        $user = new User;

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->registered = $request->registered;
        $user->type = 'Free';

        $user->save();

        return response('registered', 200);
    }

    public function snsRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'gender' => 'required',
            'registered' => 'required',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return response($validator->errors());
        }

        $user = new User;

        $user->email = $request->email;
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->registered = $request->registered;
        $user->type = 'Free';

        $user->save();

        return response('registered', 200);
    }

    public function checkSNSLogin($email)
    {
//        return response($email,200);
        if (User::where('email', $email)->exists()) {
            return response('login', 200);
        }
        else {
            return response('register', 200);
        }
    }
}
