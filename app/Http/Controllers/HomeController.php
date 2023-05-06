<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Categorie;
use App\Models\Image;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class HomeController extends Controller
{
    public function index()
    {
        $annonces = DB::table('annonces')

        ->leftJoin('images', function ($join) {
            $join->on('annonces.id_objet', '=', 'images.id_annonce')
                ->whereRaw("FIND_IN_SET(images.id, annonces.images) > 0");
                
        })
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->join('users', 'annonces.id_partenaire', '=', 'users.id')
        ->where('users.isBlocked', '=', 0)
        ->where('annonces.status', '=', 'enligne')
     
        ->select(   DB::raw('MIN(images.image) as image'),  DB::raw('AVG(reviews.note_client_objet)*20 as note'),
        DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id','annonces.created_at','annonces.titre', 'annonces.ville','annonces.description', 
        'annonces.prix', 'objets.nom_objet','categories.nom_categorie')
        ->groupBy('annonces.id','annonces.created_at', 'annonces.titre', 'annonces.description', 'annonces.prix', 
        'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
        ->get();
        // DB::raw('MIN(images.image) as image'),
        $categories = ['Vêtements', 'Électronique', 'Maison et jardin'];
        
           // ->join('images', 'annonces.id_objet', '=', 'images.id_annonce')
      

      
        
       
       $categories1= Categorie::take(5)->get();
       $categories2= Categorie::skip(5)->take(4)->get();
       return view('welcome')->with([
        'annonces'=>$annonces,
     
        'categories1'=> $categories1,
        'categories2'=> $categories2,
       ]);
    }
}
