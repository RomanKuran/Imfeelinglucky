<?php

use Illuminate\Support\Facades\Route;

Route::get('/users',  [App\Http\Controllers\Admin\Pages\Users\UsersController::class, 'users'])->name('admin.users');
Route::put('/users/edit',  [App\Http\Controllers\Admin\Pages\Users\EditUserControlleer::class, 'edit'])->name('admin.editUser');
Route::delete('/users/delete',  [App\Http\Controllers\Admin\Pages\Users\DeleteUserControlleer::class, 'delete'])->name('admin.deleteUser');
Route::post('/users/create',  [App\Http\Controllers\Admin\Pages\Users\CreateUserControlleer::class, 'create'])->name('admin.createUser');
