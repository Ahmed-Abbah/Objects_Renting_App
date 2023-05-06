<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
  public function userInfo($id)
  {

    $user = User::where('id', $id)->first();

    $avg1 = DB::table('reviews')
      ->select(DB::raw('AVG(note_client_partenaire) as moyenne'))
      ->where('id_partenaire', $id)
      ->get();

    $avg2 = DB::table('reviews')
      ->select(DB::raw('AVG(note_partenaire_client) as moyenne2'))
      ->where('id_client', $id)
      ->get();


    //  dd($moyenne);

    if ($avg1->first()->moyenne === null) {
      $avg = $avg2->first()->moyenne2;
    } else if ($avg2->first()->moyenne2 === null) {
      $avg = $avg1->first()->moyenne;
    } else {
      $avg = ($avg1->first()->moyenne + $avg2->first()->moyenne2) / 2;
    }
    //   dd($moyenne);

    return view('profile.userInfo', ['user' => $user, 'avg' => $avg]);
  }


  public function desactiver()
  {
    $id=Auth::user()->id;
    $user = User::find($id);
    $user->isBlocked = 1;
    $user->save();
    Auth::logout();

    return Redirect::route('/welcome');
  }
}
