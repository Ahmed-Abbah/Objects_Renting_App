<?php

namespace App\Http\Controllers;
use Carbon\carbon;

use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReviewController extends Controller
{
    public function index()
    {
        return view('review.review_partenaire');
    }
    public function  liste_reservation_partenaire(){
        $id_user=Auth::user()->id;
        // dd($id_user);
        
        $query1=  DB::table('reservations')
        ->join('annonces', 'reservations.id_annonce', '=', 'annonces.id')
        ->join('users', 'annonces.id_partenaire', '=', 'users.id')
      
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')

        ->groupBy('users.name','users.prenom', 'reservations.date_fin','users.ville','annonces.description','annonces.id_partenaire','reservations.id','reservations.id_annonce','objets.nom_objet')
        
        ->select('users.name','users.prenom','users.ville','annonces.id_partenaire','annonces.description','annonces.id_partenaire','reservations.id', 'reservations.date_fin','reservations.id_annonce','objets.nom_objet')
        ->where('annonces.id_partenaire','=',$id_user)
        ->where('reservations.review_partenaire','=','yes')
        ->get();
  

         
     
        return view('review.liste_reservation_partenaire')->with([
          'query1'=>$query1,
    
         ]);

    }
    
    public function add_review_partenaire(){

       

        return view('review.review_partenaire');

    }

        


    public function store_review_partenaire($id){
        // dd($id);

        $reservation=  DB::table('reservations')
        ->join('annonces', 'reservations.id_annonce', '=', 'annonces.id')
        ->groupBy('annonces.id_partenaire','reservations.id','reservations.id_client')
        
        ->select('annonces.id_partenaire','reservations.id','reservations.id_client')
        ->where('reservations.id',$id)
        ->get();
        // dd($reservation);

        $review=  DB::table('reviews')
        ->where('id_reservation',$id)
        ->first();
        $comment_part = request('comment_part');
        $note_partenaire_client = request()->input('stars');
     
        
  



        if (empty($review)) {
            DB::table('reviews')->insert([
                'id_reservation' => $id,
                'id_client' => $reservation[0]->id_client,
                'id_partenaire' => $reservation[0]->id_partenaire,
                'note_partenaire_client' => $note_partenaire_client,
                'commentaire_partenaire_client' => $comment_part
            ]);

                DB::table('reservations')
                    ->where('id', $id)
                    ->update([
                        'review_partenaire' => 'end'
                    ]);
       
        }  else {
            $id_review=$review->id;
            
            DB::table('reviews')
            ->where('id', $id_review)
            ->update([
                'note_partenaire_client' => $note_partenaire_client,
                'commantaire_partenaire_client' => $comment_part,
                'display'=>'yes'
            ]);

            DB::table('reservations')
            ->where('id', $id)
            ->update([
                'review_partenaire' => 'end'
            ]);
        
        }


        
        return redirect()->route('liste_reservation_partenaire');

    }

    public function  liste_reservation_client(){
        $id_user=Auth::user()->id;
        // dd($id_user);
        
        $query1=  DB::table('reservations')
        ->join('annonces', 'reservations.id_annonce', '=', 'annonces.id')
        ->join('users', 'reservations.id_client', '=', 'users.id')
      
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')

        ->groupBy( 'reservations.date_fin','users.name','users.prenom','users.ville','annonces.id_partenaire','annonces.description','reservations.id_client','reservations.id','reservations.id_annonce','objets.nom_objet')
        
        ->select( 'reservations.date_fin','users.name','users.prenom','users.ville','annonces.id_partenaire','annonces.description','reservations.id_client','reservations.id','reservations.id_annonce','objets.nom_objet')
        ->where('reservations.id_client','=',$id_user)
        ->where('reservations.review_client','=','yes')
        ->get();
  

         
     
        return view('review.liste_reservation_client')->with([
          'query1'=>$query1,
    
         ]);

    }

    public function    add_review_client(){

       

        return view('review.review_client');

    }


    

    public function store_review_client($id){
        // dd($id);

        $reservation=  DB::table('reservations')
        ->join('annonces', 'reservations.id_annonce', '=', 'annonces.id')
        ->groupBy('annonces.id_partenaire','reservations.id','reservations.id_client')
        
        ->select('annonces.id_partenaire','reservations.id','reservations.id_client')
        ->where('reservations.id',$id)
        ->get();
        // dd($reservation);

        $review=  DB::table('reviews')
        ->where('id_reservation',$id)
        ->first();
        $comment_client_partenaire = request('comment_client_partenaire');
        $note_client_partenaire = request()->input('note_partenaire');
        $comment_client_objet = request('comment_client_objet');
        $note_client_objet = request()->input('note_objet');
        
        



        if (empty($review)) {
            DB::table('reviews')->insert([
                'id_reservation' => $id,
                'id_client' => $reservation[0]->id_client,
                'id_partenaire' => $reservation[0]->id_partenaire,
                'note_client_partenaire' => $note_client_partenaire,
                'commantaire_client_partenaire' => $comment_client_partenaire,
                'note_client_objet' => $note_client_objet,
                'commantaire_client_objet' => $comment_client_objet,
            ]);

                DB::table('reservations')
                    ->where('id', $id)
                    ->update([
                        'review_client' => 'end'
                    ]);
            
        }  else {
        
            $id_review=$review->id;
            
            DB::table('reviews')
            ->where('id', $id_review)
            ->update([
                'note_client_partenaire' => $note_client_partenaire,
                'commantaire_client_partenaire' => $comment_client_partenaire,
                'note_client_objet' => $note_client_objet,
                'commantaire_client_objet' => $comment_client_objet,
                'display'=>'yes'
            ]);

            DB::table('reservations')
            ->where('id', $id)
            ->update([
                'review_client' => 'end'
            ]);
        
        }


        return redirect()->route('liste_reservation_client');

    }
    public function reservationEvent()
{
    $reservations = DB::table('reservations')
        ->where('date_fin', '<=', Carbon::now()->toDateString())
        ->get();

    //var_dump($reservations); 
    
    foreach ($reservations as $reservation) {
        $dateFin = Carbon::parse($reservation->date_fin);
        $diffInDays = Carbon::now()->diffInDays($dateFin,true);

        if ($diffInDays > 7) {
            DB::table('reservations')
                ->where('id', $reservation->id)
                ->update([
                    'review_partenaire' => 'end',
                    'review_client' => 'end',
                ]);
        } else {
            DB::table('reservations')
                ->where('id', $reservation->id)
                ->update([
                    'review_partenaire' => 'yes',
                    'review_client' => 'yes',
                ]);
        }
    }
}

 

}
