<?php

namespace Nowyouwerkn\WerknHub\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $home = auth()->user()->hasRole('customer') ? '/profile' : '/hub';

        return redirect()->intended($home);
    }
}
