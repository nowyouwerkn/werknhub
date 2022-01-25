<?php

namespace Nowyouwerkn\WerknHub\Services\Auth;

use Nowyouwerkn\WerknHub\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ChagngePassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \Nowyouwerkn\WerknHub\Models\User
     */
    public function reset($user, array $input)
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}