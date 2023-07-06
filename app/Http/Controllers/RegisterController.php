<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Events\SendMail;

class RegisterController extends Controller
{
    public function register() {
        $user = User::create([
          'name' => 'jeet',
          'email' => 'jeetchaani@gmail.com',
          'password' => '123456'
        ]);

        event(new SendMail($user->id));
        dd($user);
    }
}
