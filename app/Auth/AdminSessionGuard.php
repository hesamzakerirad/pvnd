<?php

namespace App\Auth;

use Illuminate\Auth\SessionGuard;

class AdminSessionGuard extends SessionGuard
{
    protected function hasValidCredentials($user, $credentials): bool
    {
        if (! parent::hasValidCredentials($user, $credentials)) {
            return false;
        }

        return (bool) $user->is_admin === true;
    }
}
