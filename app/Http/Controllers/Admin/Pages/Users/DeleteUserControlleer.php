<?php

namespace App\Http\Controllers\Admin\Pages\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\Users\DeleteUserRequest;
use App\Models\User;

class DeleteUserControlleer extends Controller
{
    public function delete(DeleteUserRequest $request){
        $userId = $request->user_id;
        return User::where('id', $userId)->delete();
    }
}
