<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {

    // User functions

    public function userCreate($email, $password)
    {
        $user = [
            'email'=> $email,
            'password' => $password];
        $login = false;
        if ($email != "" && $password != "")
        {
            User::create($user);

            $login = true;
        }
        return view('forumhome', compact('user'), compact('login'));

    }


    public function userLogin($email, $password)
    {
        dd('lkasd');
        $login = false;

        if ($email != "" && $password != "")
        {
            $user = User::where('email', '=', $email)->where('password', '=', $password)->get();
            if ($user)
            {
                $login = true;
            }
            return view('home', compact('user'), compact('login'));
        }
        return view('home', compact('login'));

    }

    // Check buttons for login/create

    public function postAuth()
    {
        $user = Request::all();
        if (Input::get('login'))
        {
            $this->userLogin($user['email'], $user['password']);
        } else if (Input::get('create'))
        {
            $this->userCreate($user['email'], $user['password']);
        }
    }


    public function checkUser(Array $attributes)
    {

    }
}
