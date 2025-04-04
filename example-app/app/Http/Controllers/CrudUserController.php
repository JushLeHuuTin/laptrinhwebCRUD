<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('exe.exe1.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Registration page
     */
    public function createUser()
    {
        return view('exe/exe1/register');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            // 'phone' => 'required',
            // 'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm-password' =>'required|same:password',
        ]);

        $data = $request->all();
        $check = User::create([
            'username' => $data['username'],
            // 'phone' => $data['phone'],
            // 'address' => $data['address'],
            'email' => $data['email'],
            'password' => FacadesHash::make($data['password'])
        ]);

        return redirect("login");
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('exe.exe1.view', ['messi' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('exe.exe1.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'username' => 'required|unique:users,id',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
            'confirm-password' =>'required|same:password',
        ]);

       $user = User::find($input['id']);
       $user->username = $input['username'];
       $user->email = $input['email'];
       $user->password = $input['password'];
       $user->save();

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * List of users
     */
    public function listUser()
    {
        if(Auth::check()){
            $users = User::all();
            return view('exe.exe1.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut() {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }
}
