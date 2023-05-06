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
        $validator=Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'prenom'=>['string','min:3','required'],
            'tel'=>['numeric','required','min:10'],
            'adresse'=>['string'],
            'ville'=>['string'],
        ],[
            'email.required'=>'Champs est obligatoire',
            'email.email'=>'Champs est invalide',
            'email.max'=>'Champs est trop long',
            'email.unique' => 'Cet e-mail est déjà utilisé.',
            'prenom.required'=>'Ce champs est obligatoire',
            'prenom.min'=>'prenom doit contient au moins 3 caracters',
            'tel.required'=>'telephome est obligatoire',
            'tel.min'=>'telephome doit contenir au moins 10 caracteres',
        ]
    );

        if($validator->fails()){
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        return User::create([
            'name' => $input['name'],
            'prenom'=>$input['prenom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'adresse'=>$input['adresse'],
            'ville'=>$input['ville'],
            'tel'=>$input['tel'],
            'profile'=>'images/profile/default.jpg',
            'isAdmin'=>0,
        ]);
    }
}