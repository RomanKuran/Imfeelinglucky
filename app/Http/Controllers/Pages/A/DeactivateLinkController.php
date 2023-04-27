<?php

namespace App\Http\Controllers\Pages\A;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeactivateLinkController extends Controller
{
    public function deactivate()
    {
        $user = Auth::user();
        $link = $user->link;

        $linkExpirationDate = $user->linkExpirationDate;
        $deactivateLinkExpirationDate = Carbon::parse($linkExpirationDate)->subDays(8);

        $user->update([
            'linkExpirationDate' => $deactivateLinkExpirationDate
        ]);

        return redirect()->route('main', ['link' => $link]);
    }
}
