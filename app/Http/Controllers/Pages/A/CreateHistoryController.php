<?php

namespace App\Http\Controllers\Pages\A;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\A\CreateHistoryRequest;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CreateHistoryController extends Controller
{

    public function create(CreateHistoryRequest $request)
    {
        $user = Auth::user();

        $randomNumber = +$request->random_number;
        $winningStatus = $request->boolean('winning_status');
        $amountOfWinning = $request->float('amount_of_winning');
        return History::create([
            'user_id' => $user->id,
            'random_number' => $randomNumber,
            'winning_status' => $winningStatus,
            'amount_of_winning' => $amountOfWinning
        ]);
    }
}
