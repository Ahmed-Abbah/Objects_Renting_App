<?php
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\ProfileInformationUpdatedResponse as ProfileInformationUpdatedContract;

class ProfileInformationUpdatedResponse  implements ProfileInformationUpdatedContract
{
  public function toResponse($request)
  {

    $successMessage = 'Le profil a été mis à jour avec succès !';
    return redirect()->route('category')->with('success', $successMessage)->with('swal', $successMessage);
 
  }
}