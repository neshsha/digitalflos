<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
     public function admingetall() {
        $users = User::orderBy('created_at', 'ASC')->paginate(10);
        return view('admin.users', compact('users'));
    }
}
