<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Annonce;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
   
        $categories1 = DB::table('categories')
        ->leftJoin('objets', 'objets.id_categorie', '=', 'categories.id')
        ->leftJoin('annonces', 'annonces.id_objet', '=', 'objets.id')
        ->select('categories.nom_categorie', 'categories.id', DB::raw('count(DISTINCT annonces.id) as nombre_objets'))
        ->groupBy('categories.nom_categorie', 'categories.id')
        ->get();
        

        $villes = DB::table('annonces')
        ->leftJoin('objets', 'annonces.id_objet', '=', 'objets.id')
        ->select('annonces.ville', DB::raw('count(objets.id) as nombre_objets'))
        ->groupBy('annonces.ville')
        ->get();

        $prix_min = DB::table('annonces')->min('prix');
        $prix_max = DB::table('annonces')->max('prix');

    
      
        $cities = $request->input('cities');
        
 

  

        $categories2 = Categorie::all();
        

       $annonces2 = DB::table('annonces')
            ->join('images', 'annonces.id', '=', 'images.id_annonce')
            ->join('objets', 'annonces.id_objet', '=', 'objets.id')
            ->join('categories', 'objets.id_categorie', '=', 'categories.id')
            ->select('annonces.id','annonces.created_at','annonces.titre', 'annonces.ville','annonces.description', 
            'annonces.prix', DB::raw('MIN(images.image) as image'),'objets.nom_objet','categories.nom_categorie')
            ->where('categories.id', $request->id)
            ->where('annonces.status', '=', 'enligne')
            ->groupBy('annonces.id','annonces.created_at', 'annonces.titre', 'annonces.description', 'annonces.prix', 
            'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie')
            ->get();


            if (Auth::check()) {
                $query = DB::table('annonces')
        
          
                ->join('objets', 'annonces.id_objet', '=', 'objets.id')
           
                ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
                ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
                ->leftJoin('images', function ($join) {
                    $join->on('annonces.id_objet', '=', 'images.id_annonce')
                        ->whereRaw("FIND_IN_SET(images.id, annonces.images) > 0");
                        
                })
           
    
                ->join('categories', 'objets.id_categorie', '=', 'categories.id')
                ->join('disponibilites', 'annonces.id', '=', 'disponibilites.id_annonce')
                ->join('users', 'annonces.id_partenaire', '=', 'users.id')
                ->where('users.isBlocked', '=', 0)
                ->where('annonces.status', '=', 'enligne')

                
                ->where('annonces.id_partenaire', '!=', Auth::id())
                ->select('annonces.id','annonces.created_at','annonces.titre', 'annonces.ville','annonces.description', 
                'annonces.prix', DB::raw('MIN(images.image) as image'),DB::raw('AVG(reviews.note_client_objet)*20 as note'),
                DB::raw('AVG(reviews.note_client_objet) as note_avg'),'annonces.id_partenaire'
                ,'objets.nom_objet', 'categories.nom_categorie'
                ,'disponibilites.date_debut','disponibilites.date_fin','disponibilites.jour_semaine','disponibilites.min_jour',
                )
          
                ->groupBy('annonces.id','annonces.id_partenaire','annonces.created_at', 'annonces.titre', 'annonces.description', 'annonces.prix', 
                'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie','disponibilites.id_annonce','disponibilites.date_debut','disponibilites.date_fin','disponibilites.jour_semaine','disponibilites.min_jour',
                );


                
                $query2=  DB::table('annonces')
                ->leftJoin('images', function ($join) {
                    $join->on('annonces.id_objet', '=', 'images.id_annonce')
                        ->whereRaw("FIND_IN_SET(images.id, annonces.images) > 0");
                        
                })
                ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
                ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
   
                ->join('disponibilites', 'annonces.id', '=', 'disponibilites.id_annonce')
                ->join('objets', 'annonces.id_objet', '=', 'objets.id')
                ->join('categories', 'objets.id_categorie', '=', 'categories.id')
                ->join('users', 'annonces.id_partenaire', '=', 'users.id')
                ->where('users.isBlocked', '=', 0)
                ->where('annonces.status', '=', 'enligne')
                ->where('annonces.id_partenaire', '!=', Auth::id())
                ->groupBy('annonces.id','annonces.titre','annonces.prix','annonces.created_at','annonces.ville','annonces.description',
                'objets.nom_objet','categories.nom_categorie','disponibilites.id_annonce','disponibilites.date_debut','disponibilites.date_fin',
                'disponibilites.jour_semaine','disponibilites.min_jour')
                
                ->select('annonces.id','annonces.titre','annonces.prix','annonces.created_at',
                'annonces.ville','annonces.description', DB::raw('MIN(images.image) as image'),'objets.nom_objet',
                 'categories.nom_categorie','disponibilites.id_annonce',
                 DB::raw('COUNT(reviews.commantaire_client_objet) as nb_comment'),DB::raw('AVG(reviews.note_client_objet) as note_avg'),DB::raw('AVG(reviews.note_client_objet)*20 as note'),
                 DB::raw('AVG(reviews.note_client_objet) as note_number'),'disponibilites.date_debut','disponibilites.date_fin',
                 'disponibilites.jour_semaine','disponibilites.min_jour')
                  ;

                  $categories = $request->input('categories');
                  $cities = $request->input('cities');
                  if(!empty($categories) && !empty($cities)){
                      $query->whereIn('categories.id', $categories);
                      $query->whereIn('annonces.ville', $cities);
                      $annonces = $query->paginate(6);
                      dd($annonces);
          
                      if ($request->ajax()) {
                  
                          return view('ads', [
                              'annonces'=>$annonces,
                  
                          ]);
                  
                      }
                  } elseif(!empty($categories)){
                      $query->whereIn('categories.id', $categories);
                      $annonces = $query->paginate(6);
          
                      if ($request->ajax()) {
                  
                          return view('ads', [
                              'annonces'=>$annonces,
                  
                          ]);
                  
                      }
                  } elseif(!empty($cities)){
                      $query->whereIn('annonces.ville', $cities);
                      $annonces = $query->paginate(6);
          
                      if ($request->ajax()) {
                  
                          return view('ads', [
                              'annonces'=>$annonces,
                  
                          ]);
                  
                      }
                  }

                  
        $prix_min = $request->input('prix_min');
        $prix_max = $request->input('prix_max');
        if((!empty($prix_min)) || (!empty($maxPrice)) ){
          
            $query->whereBetween('annonces.prix', [$prix_min, $prix_max]);
            $annonces = $query->paginate(6);
            if ($request->ajax()) {
        
                return view('ads', [
                    'annonces'=>$annonces,
             
                ]);
                
            }
        }

        $sortByPrice = $request->input('sortByPrice');
        
        if (!empty($sortByPrice)) {
            $query->orderBy('prix', $sortByPrice);
            
            $annonces = $query->paginate(6);
            if ($request->ajax()) {
        
                return view('ads', [
                    'annonces'=>$annonces,
             
                ]);
                
            }
    
           
        } 
       
        $debut = $request->input('debut');
        $fin = $request->input('fin');

 
        if((!empty($debut)) || (!empty($fin)) ){
            
            $query->where('disponibilites.date_debut', '<=', $fin)
            ->where('disponibilites.date_fin', '>=', $debut);
            $annonces = $query->paginate(6);
            if ($request->ajax()) {
        
                return view('ads', [
                    'annonces'=>$annonces,
             
                ]);
                
            }
            
            // $annonces = $query
            // ->paginate(2);  
            
        }
        
        $note = $request->input('lastChecked');
       
       
        if((!empty($note))){
            $query2->havingRaw('ROUND(AVG(reviews.note_client_objet)) = ?', [$note]);
            $annonces = $query2->paginate(6);
            if ($request->ajax()) {
        
                return view('ads', [
                    'annonces'=>$annonces,
             
                ]);
                
            }

        }

        $comment = $request->input('comment');
        $pos=3;
        
       
        if((!empty($comment))){
            if($comment =='Negatif'){
                $query2->havingRaw('(AVG(reviews.note_client_objet)) < ?', [$pos]);
                $annonces = $query2->paginate(6);
                if ($request->ajax()) {
        
                    return view('ads', [
                        'annonces'=>$annonces,
                 
                    ]);
                    
                }

            }
            if($comment =='Positif'){
                $query2->havingRaw('(AVG(reviews.note_client_partenaire)) >= ?', [$pos]);
                $annonces = $query2->paginate(6);
                if ($request->ajax()) {
        
                    return view('ads', [
                        'annonces'=>$annonces,
                 
                    ]);
                    
                }
              

            }

        }
        
        
       
        else{
        $categories =Categorie::select('id')->get();
        $cities = Annonce::select('ville')->distinct()->get();
        $prices = Annonce::select('prix')->get();
        $query->whereIn('categories.id', $categories);
        $query->orderBy('prix', 'asc');
        $annonces = $query->paginate(6);
        }

        if ($request->ajax()) {
        
            return view('ads', [
                'annonces'=>$annonces,
         
            ]);
            
        }else{

            return view('category', [
                'query2'=> $query2,
        
                'prix_min'=>$prix_min,
                'prix_max'=>$prix_max,
                'villes'=>$villes,
                'annonces'=>$annonces,
                'annonces2'=>$annonces2,
        
                'categories2'=>$categories2,
                'prix_min'=>$prix_min,
                'prix_max'=> $prix_max,
        
                'categories'=>$categories,
                'categories1' => $categories1,
            ]);

        }
        
   

          
         
    
                } else {
                    $query = DB::table('annonces')
        
                    ->leftJoin('images', function ($join) {
                        $join->on('annonces.id_objet', '=', 'images.id_annonce')
                            ->whereRaw("FIND_IN_SET(images.id, annonces.images) > 0");
                            
                    })
                    ->join('objets', 'annonces.id_objet', '=', 'objets.id')
                    ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
                    ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
               
        
                    ->join('categories', 'objets.id_categorie', '=', 'categories.id')
                    ->join('disponibilites', 'annonces.id', '=', 'disponibilites.id_annonce')
                    ->join('users', 'annonces.id_partenaire', '=', 'users.id')
                    ->where('users.isBlocked', '=', 0)
                    ->where('annonces.status', '=', 'enligne')
                    ->select('annonces.id','annonces.created_at','annonces.titre', 'annonces.ville','annonces.description', 
                    'annonces.prix', DB::raw('MIN(images.image) as image'),DB::raw('AVG(reviews.note_client_objet)*20 as note'),
                    DB::raw('AVG(reviews.note_client_objet) as note_avg')
                    ,'objets.nom_objet', 'categories.nom_categorie'
                    ,'disponibilites.date_debut','disponibilites.date_fin','disponibilites.jour_semaine','disponibilites.min_jour',
                    )
              
                    ->groupBy('annonces.id','annonces.created_at', 'annonces.titre', 'annonces.description', 'annonces.prix', 
                    'annonces.ville', 'objets.nom_objet', 'categories.nom_categorie','disponibilites.id_annonce','disponibilites.date_debut','disponibilites.date_fin','disponibilites.jour_semaine','disponibilites.min_jour',
                    );


                    
                    $query2=  DB::table('annonces')
                    ->leftJoin('reservations', 'annonces.id', '=', 'reservations.id_annonce')
                    ->leftJoin('reviews', 'reservations.id', '=', 'reviews.id_reservation')
                    ->leftJoin('images', function ($join) {
                        $join->on('annonces.id_objet', '=', 'images.id_annonce')
                            ->whereRaw("FIND_IN_SET(images.id, annonces.images) > 0");
                            
                    })
                    ->join('disponibilites', 'annonces.id', '=', 'disponibilites.id_annonce')
                    ->join('objets', 'annonces.id_objet', '=', 'objets.id')
                    ->join('categories', 'objets.id_categorie', '=', 'categories.id')
                    ->join('users', 'annonces.id_partenaire', '=', 'users.id')
                    ->where('users.isBlocked', '=', 0)
                    ->where('annonces.status', '=', 'enligne')
                    ->groupBy('annonces.id','annonces.titre','annonces.prix','annonces.created_at','annonces.ville','annonces.description',
                    'objets.nom_objet','categories.nom_categorie','disponibilites.id_annonce','disponibilites.date_debut','disponibilites.date_fin',
                    'disponibilites.jour_semaine','disponibilites.min_jour')
                    
                    ->select('annonces.id','annonces.titre','annonces.prix','annonces.created_at',
                    'annonces.ville','annonces.description', DB::raw('MIN(images.image) as image'),'objets.nom_objet',
                    'categories.nom_categorie','disponibilites.id_annonce',
                    DB::raw('COUNT(reviews.commantaire_client_objet) as nb_comment'),DB::raw('AVG(reviews.note_client_objet) as note_avg'),DB::raw('AVG(reviews.note_client_objet)*20 as note'),
                    DB::raw('AVG(reviews.note_client_objet) as note_number'),'disponibilites.date_debut','disponibilites.date_fin',
                    'disponibilites.jour_semaine','disponibilites.min_jour')
                    ;

                    $categories = $request->input('categories');
                    $cities = $request->input('cities');
                    if(!empty($categories) && !empty($cities)){
                        $query->whereIn('categories.id', $categories);
                        $query->whereIn('annonces.ville', $cities);
                        $annonces = $query->paginate(6);
                        dd($annonces);
            
                        if ($request->ajax()) {
                    
                            return view('ads', [
                                'annonces'=>$annonces,
                    
                            ]);
                    
                        }
                    } elseif(!empty($categories)){
                        $query->whereIn('categories.id', $categories);
                        $annonces = $query->paginate(6);
            
                        if ($request->ajax()) {
                    
                            return view('ads', [
                                'annonces'=>$annonces,
                    
                            ]);
                    
                        }
                    } elseif(!empty($cities)){
                        $query->whereIn('annonces.ville', $cities);
                        $annonces = $query->paginate(6);
            
                        if ($request->ajax()) {
                    
                            return view('ads', [
                                'annonces'=>$annonces,
                    
                            ]);
                    
                        }
                    }
                    
        $prix_min = $request->input('prix_min');
        $prix_max = $request->input('prix_max');
        if((!empty($prix_min)) || (!empty($maxPrice)) ){
          
            $query->whereBetween('annonces.prix', [$prix_min, $prix_max]);
            $annonces = $query->paginate(6);
            if ($request->ajax()) {
        
                return view('ads', [
                    'annonces'=>$annonces,
             
                ]);
                
            }
        }

        $sortByPrice = $request->input('sortByPrice');
        
        if (!empty($sortByPrice)) {
            $query->orderBy('prix', $sortByPrice);
            
            $annonces = $query->paginate(6);
            if ($request->ajax()) {
        
                return view('ads', [
                    'annonces'=>$annonces,
             
                ]);
                
            }
    
           
        } 
       
        $debut = $request->input('debut');
        $fin = $request->input('fin');

 
        if((!empty($debut)) || (!empty($fin)) ){
            
            $query->where('disponibilites.date_debut', '<=', $fin)
            ->where('disponibilites.date_fin', '>=', $debut);
            $annonces = $query->paginate(6);
            if ($request->ajax()) {
        
                return view('ads', [
                    'annonces'=>$annonces,
             
                ]);
                
            }
            
            // $annonces = $query
            // ->paginate(2);  
            
        }
        
        $note = $request->input('lastChecked');
       
       
        if((!empty($note))){
            $query2->havingRaw('ROUND(AVG(reviews.note_client_objet)) = ?', [$note]);
            $annonces = $query2->paginate(6);
            if ($request->ajax()) {
        
                return view('ads', [
                    'annonces'=>$annonces,
             
                ]);
                
            }

        }

        $comment = $request->input('comment');
        $pos=3;
        
       
        if((!empty($comment))){
            if($comment =='Negatif'){
                $query2->havingRaw('(AVG(reviews.note_client_objet)) < ?', [$pos]);
                $annonces = $query2->paginate(6);
                if ($request->ajax()) {
        
                    return view('ads', [
                        'annonces'=>$annonces,
                 
                    ]);
                    
                }

            }
            if($comment =='Positif'){
                $query2->havingRaw('(AVG(reviews.note_client_partenaire)) >= ?', [$pos]);
                $annonces = $query2->paginate(6);
                if ($request->ajax()) {
        
                    return view('ads', [
                        'annonces'=>$annonces,
                 
                    ]);
                    
                }
              

            }

        }
        
        
       
        else{
        $categories =Categorie::select('id')->get();
        $cities = Annonce::select('ville')->distinct()->get();
        $prices = Annonce::select('prix')->get();
        $query->whereIn('categories.id', $categories);
        $query->orderBy('prix', 'asc');
        $annonces = $query->paginate(6);
        }

        if ($request->ajax()) {
        
            return view('ads', [
                'annonces'=>$annonces,
         
            ]);
            
        }else{

            return view('category', [
                'query2'=> $query2,
        
                'prix_min'=>$prix_min,
                'prix_max'=>$prix_max,
                'villes'=>$villes,
                'annonces'=>$annonces,
                'annonces2'=>$annonces2,
        
                'categories2'=>$categories2,
                'prix_min'=>$prix_min,
                'prix_max'=> $prix_max,
        
                'categories'=>$categories,
                'categories1' => $categories1,
            ]);

        }
        
   

          
         
        
                    }

        
      
       
        

      
      
       
    
     
        
    }

}


