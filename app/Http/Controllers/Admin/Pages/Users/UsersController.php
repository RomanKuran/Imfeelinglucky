<?php

namespace App\Http\Controllers\Admin\Pages\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function users(){
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.pages.users', compact('users'));
    }
}
