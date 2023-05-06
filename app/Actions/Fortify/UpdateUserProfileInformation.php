<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'prenom'=>['string','min:3','required'],
            'tel'=>['string'],
            'adresse'=>['string'],
            'ville'=>['string'],
            'profile'=>['image', 'mimes:jpeg,png,jpg,gif,bmp,svg', 'max:5000'],
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            if(request()->has('profile')){
                $imageupload = request()->file('profile');
                $imagename = time().'.'. $imageupload->getClientOriginalExtension();
                $imagepath = public_path('images/profile/');
                $imageupload->move($imagepath, $imagename);
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'prenom' => $input['prenom'],
                    'tel' => $input['tel'],
                    'adresse' => $input['adresse'],
                    'ville' => $input['ville'],
                    'profile' => 'images/profile/'. $imagename,
                ])->save();
            }
            else{
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'prenom' => $input['prenom'],
                    'tel' => $input['tel'],
                    'adresse' => $input['adresse'],
                    'ville' => $input['ville'],
                    'profile' => Auth::user()->profile,
                ])->save();
            }
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
