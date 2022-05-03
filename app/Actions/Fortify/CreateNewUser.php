<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'cin' => ['required', 'string', 'max:255'],
            'matricule' => ['required', 'string', 'max:255'],
            'fonction' => ['required', 'string', 'max:255'],
            'grade' => ['required', 'string', 'max:255'],
            'echelle' => ['required', 'string', 'max:255'],
            'service' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'nom' => $input['nom'],
            'cin' => $input['cin'],
            'matricule' => $input['matricule'],
            'fonction' => $input['fonction'],
            'echelle' => $input['echelle'],
            'grade' => $input['grade'],
            'service' => $input['service'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
