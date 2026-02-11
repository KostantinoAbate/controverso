<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'birthdate' => ['nullable', 'date'],
            'country' => ['nullable', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'accepted_terms' => ['accepted'],
            'accepted_privacy' => ['accepted'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'username' => $input['username'],
            'birthdate' => $input['birthdate'],
            'country' => $input['country'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'compliance' => [
                'terms' => $input['accepted_terms'],
                'privacy' => $input['accepted_privacy'],
            ],
        ]);
    }
}
