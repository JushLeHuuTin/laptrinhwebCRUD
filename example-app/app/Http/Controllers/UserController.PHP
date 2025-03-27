<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->orderBy('user_name', 'asc')
            ->get();

        return view('exe.exe2.list', ['users' => $users]);
    }
}