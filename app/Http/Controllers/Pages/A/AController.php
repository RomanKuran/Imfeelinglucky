<?php

namespace App\Http\Controllers\Pages\A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AController extends Controller
{
    public function a(){
        $user = Auth::user();
        $userLink = $user->link;

        return view('pages.a.a', compact('userLink'));
    }
}
