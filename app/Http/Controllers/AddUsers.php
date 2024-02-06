<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AddUsers extends Controller
{
    public function list_users()
    {
        $users = User::all();

        //dd($users);
        return view('admin.list_users');
    }

    public function add_user()
    {
      
        return view('admin.add_user');
    }
}
