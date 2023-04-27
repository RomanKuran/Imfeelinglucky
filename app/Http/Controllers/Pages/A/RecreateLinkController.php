<?php

namespace App\Http\Controllers\Pages\A;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecreateLinkController extends Controller
{
    // We rebuild the link and redirect the user to page "A"
    public function recreate()
    {
        $user = Auth::user();

        $currentDateTime = Carbon::now()->toDateTimeString();
        $currentTimestamp = Carbon::parse($currentDateTime)->timestamp;

        $link = $user->id . $currentTimestamp;

        $user->update([
            'link' => $link,
        ]);

        return redirect()->route('a', ['link' => $link]);
    }
    // ----
}
