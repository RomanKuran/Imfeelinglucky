<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsBlockUniqueLink
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $link = $request->link;
        $user = User::where('link', $link)->first();
        if (isset($user)) {
            $result = $this->checkDate($user);

            if ($result) {
                Auth::login($user);
                return $next($request);
            } else {
                return redirect()->route('main');
            }
        } else {
            return redirect()->route('main');
        }
    }

    // The function of comparing today's date and the date to which the link is valid
    private function checkDate($user)
    {
        $linkExpirationDate = $user->linkExpirationDate;
        $currentDateTime = Carbon::now()->toDateTimeString();

        $linkExpirationDate = Carbon::parse($linkExpirationDate);
        $currentDateTime = Carbon::parse($currentDateTime);

        if ($currentDateTime < $linkExpirationDate) {
            return true;
        } else {
            return false;
        }
    }
    // ----
}
