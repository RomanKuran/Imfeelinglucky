<?php

namespace App\Http\Controllers\Admin\Pages\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\Users\EditUserRequest;
use App\Models\User;

class EditUserControlleer extends Controller
{
    public function edit(EditUserRequest $request)
    {
        $userId = $request->user_id;
        $fieldName = $request->field_name;
        $value = $request->value;

        return User::where('id', $userId)->update([
            $fieldName => $value
        ]);
    }
}
