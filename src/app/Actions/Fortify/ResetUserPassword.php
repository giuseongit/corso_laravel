<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  array<string, string>  $input
     */
    public function reset(User $user, array $input): void
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        $salt = bin2hex(random_bytes(32)); // genera il salt
        $hashed = Hash::make($input['password'].$salt); // produce l'hash della stringa insieme al salt

        $user->forceFill([
            'password' => $hashed,
            'salt' => $salt
        ])->save();
    }
}
