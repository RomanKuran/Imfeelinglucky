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

        $linkExpirationDate = $user->link_expiration_date;
        $deactivateLinkExpirationDate = Carbon::parse($linkExpirationDate)->subDays(8);

        $user->update([
            'link_expiration_date' => $deactivateLinkExpirationDate
        ]);

        return redirect()->route('main', ['link' => $link]);
    }
}
