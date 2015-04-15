<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Auth;
use Request;

class UserController extends Controller {


    public function index()
    {
        //
        $user = Auth::user();


        return view('user.home', compact('user'));

        /*

        get current user | done


        show info



        */

    }

    public function userUpdate($id)
    {
        $changedUser = Request::all();



        $user = User::find($id);

        $user->name = $changedUser['Name'];
        $user->email = $changedUser['Email'];

        $user->save();

        return redirect('/');
    }
}
