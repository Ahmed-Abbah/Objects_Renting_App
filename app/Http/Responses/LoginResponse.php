<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
  public function toResponse($request)
  {
    if(Auth::user()->isAdmin){
      return redirect()->route('admin.index');
    }else{
      return redirect()->route('category');
    }
  }
}