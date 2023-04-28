<?php

namespace App\Http\Controllers\Admin\Pages\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\Users\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CreateUserControlleer extends Controller
{
    public function create(CreateUserRequest $request){
        $userName = $request->username;
        $phoneNumber = $request->phonenumber;
        $link = $request->link;

        $user = User::create([
            'username' => $userName,
            'phonenumber' => $phoneNumber,
            'link' => $link
        ]);

        $userId = $user->id;

        $user = ['userId' => $userId];
        $user = json_encode($user, JSON_UNESCAPED_UNICODE);
        return $user;
    }
}
