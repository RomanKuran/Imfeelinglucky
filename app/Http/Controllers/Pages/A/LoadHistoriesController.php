<?php

namespace App\Http\Controllers\Pages\A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoadHistoriesController extends Controller
{
    public function load()
    {
        $user = Auth::user();
        $histories = $user->orders()->orderBy('id', 'DESC')->take(3)->select(
            'random_number',
            'winning_status',
            'amount_of_winning'
        )->get();

        $histories = ['histories' => $histories];
        $histories = json_encode($histories, JSON_UNESCAPED_UNICODE);
        return $histories;
    }
}
