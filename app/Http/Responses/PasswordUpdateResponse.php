<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\PasswordUpdateResponse as PasswordUpdateResponseContracts;

class PasswordUpdateResponse implements PasswordUpdateResponseContracts{
  
  public function toResponse($request)
  {
    return redirect('/profile/edit');
  }
}