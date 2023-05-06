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
        ->join('images', 'annonces.id', '=', 'images.id_annonce')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->where('annonces.status', '=', 'enligne')
        ->select(DB::raw('AVG(reviews.note_client_objet)*20 as note'),
        DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id','annonces.created_at','annonces.titre', 'annonces.ville','annonces.description', 
        'annonces.prix', DB::raw('MIN(images.image) as image'),'objets.nom_objet','categories.nom_categorie')
        ->groupBy('annonces.id','annonces.created_at', 'annonces.titre', 'annonces.description', 'annonces.prix', 
        'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
        ->get();

        $categories = ['Vêtements', 'Électronique', 'Maison et jardin'];
        $annonces1 = DB::table('annonces')
        ->join('images', 'annonces.id', '=', 'images.id_annonce')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->where('annonces.status', '=', 'enligne')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
                ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
       
        ->whereIn('categories.nom_categorie', $categories)
        ->select(DB::raw('AVG(reviews.note_client_objet)*20 as note'),
        DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id','annonces.titre','annonces.created_at', 'annonces.ville','annonces.description', 
        'annonces.prix', DB::raw('MIN(images.image) as image'),'objets.nom_objet','categories.nom_categorie')
        ->groupBy('annonces.id', 'annonces.created_at','annonces.titre', 'annonces.description', 'annonces.prix', 
        'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
      
        ->latest()
        ->take(3)
        ->get();
    
      

        $derniere_annonce1 = DB::table('annonces')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->where('annonces.status', '=', 'enligne')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->where('categories.nom_categorie', '=', 'Vêtements')
        ->orderBy('annonces.created_at', 'desc')
        ->limit(1)
        ->value('annonces.id');

        $annonces11 = DB::table('annonces')
        ->join('images', 'annonces.id', '=', 'images.id_annonce')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->where('annonces.status', '=', 'enligne')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->where('categories.nom_categorie', '=', 'Vêtements')
        ->whereRaw('annonces.id < ?', [$derniere_annonce1])
        // ->where('annonces.id', '<', $derniere_annonce)
        ->select(DB::raw('AVG(reviews.note_client_objet)*20 as note'),
        DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id', 'annonces.titre', 'annonces.created_at', 'annonces.ville', 'annonces.description', 'annonces.prix', DB::raw('MIN(images.image) as image'), 'objets.nom_objet', 'categories.nom_categorie')
        ->groupBy('annonces.id', 'annonces.titre', 'annonces.created_at', 'annonces.description', 'annonces.prix', 'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();


        $annonces2 = DB::table('annonces')
        ->join('images', 'annonces.id', '=', 'images.id_annonce')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->where('annonces.status', '=', 'enligne')
        ->where('categories.nom_categorie', '=', 'Électronique')
        ->select(DB::raw('AVG(reviews.note_client_objet)*20 as note'),
        DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id','annonces.titre','annonces.created_at', 'annonces.ville','annonces.description', 
        'annonces.prix', DB::raw('MIN(images.image) as image'),'objets.nom_objet','categories.nom_categorie')
        ->groupBy('annonces.id', 'annonces.created_at','annonces.titre', 'annonces.description', 'annonces.prix', 
        'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
        ->orderBy('created_at', 'desc')
        ->first();

        $derniere_annonce2 = DB::table('annonces')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->where('categories.nom_categorie', '=', 'Électronique')
        ->where('annonces.status', '=', 'enligne')
        ->orderBy('annonces.created_at', 'desc')
        ->limit(1)
        ->value('annonces.id');

        $annonces22 = DB::table('annonces')
        ->join('images', 'annonces.id', '=', 'images.id_annonce')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->where('categories.nom_categorie', '=', 'Électronique')
        ->where('annonces.status', '=', 'enligne')
        ->whereRaw('annonces.id < ?', [$derniere_annonce2])
        // ->where('annonces.id', '<', $derniere_annonce)
        ->select(DB::raw('AVG(reviews.note_client_objet)*20 as note'),
        DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id', 'annonces.titre', 'annonces.created_at', 'annonces.ville', 'annonces.description', 'annonces.prix', DB::raw('MIN(images.image) as image'), 'objets.nom_objet', 'categories.nom_categorie')
        ->groupBy('annonces.id', 'annonces.titre', 'annonces.created_at', 'annonces.description', 'annonces.prix', 'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
      


        $annonces3 = DB::table('annonces')
        ->join('images', 'annonces.id', '=', 'images.id_annonce')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->where('categories.nom_categorie', '=', 'Maison et jardin')
        ->where('annonces.status', '=', 'enligne')
        ->select(DB::raw('AVG(reviews.note_client_objet)*20 as note'),
        DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id','annonces.titre','annonces.created_at', 'annonces.ville','annonces.description', 
        'annonces.prix', DB::raw('MIN(images.image) as image'),'objets.nom_objet','categories.nom_categorie')
        ->groupBy('annonces.id', 'annonces.created_at','annonces.titre', 'annonces.description', 'annonces.prix', 
        'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
        ->orderBy('created_at', 'desc')
        ->first();

        $derniere_annonce3 = DB::table('annonces')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->where('categories.nom_categorie', '=', 'Maison et jardin')
        ->where('annonces.status', '=', 'enligne')
        ->orderBy('annonces.created_at', 'desc')
        ->limit(1)
        ->value('annonces.id');

        $annonces33 = DB::table('annonces')
        ->join('images', 'annonces.id', '=', 'images.id_annonce')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')
        ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
        ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        ->where('categories.nom_categorie', '=', 'Maison et jardin')
        ->where('annonces.status', '=', 'enligne')
        ->whereRaw('annonces.id < ?', [$derniere_annonce3])
        // ->where('annonces.id', '<', $derniere_annonce)
        ->select(DB::raw('AVG(reviews.note_client_objet)*20 as note'),
        DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id', 'annonces.titre', 'annonces.created_at', 'annonces.ville', 'annonces.description', 'annonces.prix', DB::raw('MIN(images.image) as image'), 'objets.nom_objet', 'categories.nom_categorie')
        ->groupBy('annonces.id', 'annonces.titre', 'annonces.created_at', 'annonces.description', 'annonces.prix', 'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
      
      
                    
     
        
       
       $categories1= Categorie::take(5)->get();
       $categories2= Categorie::skip(5)->take(4)->get();
       return view('welcome')->with([
        'annonces'=>$annonces,
        'annonces1'=>$annonces1,
        'annonces2'=>$annonces2,
        'annonces3'=>$annonces3,
        'annonces11'=>$annonces11,
        'annonces22'=>$annonces22,
        'annonces33'=>$annonces33,
        'categories1'=> $categories1,
        'categories2'=> $categories2,
       ]);
    }
}
