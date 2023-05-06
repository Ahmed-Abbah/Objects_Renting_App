<?php
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContracts;

class RegisterResponse implements RegisterResponseContracts{

  public function toResponse($request)
  {
    return redirect()->route('category');
  }
}
