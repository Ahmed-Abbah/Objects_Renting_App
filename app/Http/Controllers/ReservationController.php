<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Objet;
use App\Models\Annonce;
use App\Models\Image;
use App\Models\Categorie;
use App\Models\Disponibilite;
use App\Models\Reservation;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class ReservationController extends Controller
{
    public function louer(Request $request) {
       // dd($request);
       $id_client=Auth::user()->id;
       //dd($id_client);
       $id_annonce=$request->annonce_id;
       $reservation= new Reservation ;
       $reservation->date_debut = $request->input("dateDebut");
       $reservation->date_fin = $request->input("dateFin");
       $reservation->status="attente";
       $reservation->id_client =$id_client;
       $reservation->id_annonce=$request->input("annonce_id");
       $jrs=$request->input("jours");
       $reservation->jour_semaine=implode(',',$jrs);
       //dd($reservation);
       $reservation->save();
       
       //dd($annonce);
       return redirect()->route('category');


    }
}
