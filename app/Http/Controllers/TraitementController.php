<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Categorie;
use App\Models\Image;
use App\Models\Reservation;
use App\Models\User;
use App\Mail\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TraitementController extends Controller
{
    public function index()
    {
        $id_partenaire=Auth::user()->id;
       
        $query=  DB::table('reservations')
        ->join('annonces', 'reservations.id_annonce', '=', 'annonces.id')
        //->join('reviews', 'reservations.id', '=', 'reviews.id_reservation')
        //->join('images', 'annonces.id', '=', 'images.id_annonce')
      
        ->join('users', 'reservations.id_client', '=', 'users.id')
        ->join('objets', 'annonces.id_objet', '=', 'objets.id')
        ->join('categories', 'objets.id_categorie', '=', 'categories.id')

        /*->groupBy('users.nom','users.prenom','users.ville','users.tel','users.email',
        'annonces.id','annonces.titre','annonces.prix','annonces.id_partenaire','annonces.created_at','annonces.ville','annonces.description',
        'objets.nom_objet','categories.nom_categorie'
        
        ,'reservations.date_debut','reservations.date_fin','reservations.id_annonce','reservations.id_client')*/
        ->groupBy('reservations.id','reservations.date_debut','reservations.date_fin','users.id','users.profile','users.name','objets.nom_objet','categories.nom_categorie','users.prenom','users.ville','users.tel','users.email','annonces.titre','annonces.prix')
        ->select('reservations.id','reservations.date_debut','reservations.date_fin','users.id AS user_id','users.profile','users.name','objets.nom_objet','categories.nom_categorie','users.prenom','users.ville','users.tel','users.email','annonces.titre','annonces.prix')
       
        /*->select('users.nom','users.prenom','users.ville','users.tel','users.email','annonces.id','annonces.titre','annonces.prix','annonces.created_at',
        'annonces.ville','annonces.description','annonces.id_partenaire', DB::raw('MIN(images.image) as image'),'objets.nom_objet',
         'categories.nom_categorie',DB::raw('AVG(reviews.note_client_objet)*20 as note'),
         DB::raw('AVG(reviews.note_client_objet) as note_number'),
         
         'reservations.date_debut','reservations.date_fin','reservations.id_annonce','reservations.id_client')*/
          ->where('reservations.status','=','attente')
          ->where('annonces.id_partenaire','=',$id_partenaire)

                 
         ->get();

         
     
          return view('liste_reservation')->with([
            'query'=>$query,
      
           ]);
 
         



    } 

    public function accepter_reservation($id){

        $id_partenaire=Auth::user()->id;
        $contact_partenaire=User::where('id',$id_partenaire)->first();
        

       
        $demandes =  DB::table('reservations')
        ->join('users', 'reservations.id_client', '=', 'users.id')
        ->join('annonces', 'reservations.id_annonce', '=', 'annonces.id')
        ->groupBy('reservations.id_annonce','reservations.id','reservations.jour_semaine','users.name','users.prenom','users.ville','users.tel','users.email','annonces.titre','annonces.prix')
        ->select('reservations.id_annonce','reservations.id','reservations.jour_semaine','users.name as clientname','users.prenom as clientprenom','users.ville','users.tel','users.email','annonces.titre','annonces.prix')
        ->where('reservations.id',$id)->first();
        // $id_annonce=$demandes->id_annonce;  


        $demande=  Reservation::where('id',$id) 
        ->update(['status' => 'accepte']);

        // $status_annonce=  Annonce::where('id',$id_annonce) 
        // ->update(['status' => 'reserve']);

        $data_partenaire=array('namepart' => $contact_partenaire->name,'prenompart' => $contact_partenaire->prenom ,'tel'=>$contact_partenaire->tel ,'ville'=>$contact_partenaire->ville ,'email'=>$contact_partenaire->email,'titre'=>$demandes->titre,'prix'=>$demandes->prix,'jours'=>$demandes->jour_semaine);

        $data=array('clientname'=>$demandes->clientname,'clientprenom'=>$demandes->clientprenom,'tel'=>$demandes->tel ,'ville'=>$demandes->ville ,'email'=>$demandes->email,'titre'=>$demandes->titre,'prix'=>$demandes->prix,'jours'=>$demandes->jour_semaine);

        Mail::send(
            'emails.contact',['data' => $data, 'data_partenaire' => $data_partenaire],function($message) use ($data_partenaire,$data){
            $message->from('anashaouat.1@gmail.com',env('APP_NAME'));
            
            $message->to($data_partenaire['email'])->subject('Contact client');
        });
  
        Mail::send(
          'emails.contact1',['data' => $data, 'data_partenaire' => $data_partenaire],function($message) use ($data,$data_partenaire) {
          $message->from('anashaouat.1@gmail.com',env('APP_NAME'));
          
          $message->to($data['email'])->subject('Contact partenaire');
      });
         
      return redirect()->back();

        

        
    }
    

    public function refuser_reservation($id){



      $id_partenaire=Auth::user()->id;
        $contact_partenaire=User::where('id',$id_partenaire)->first();
        

       
        $demandes =  DB::table('reservations')
        ->join('users', 'reservations.id_client', '=', 'users.id')
        ->join('annonces', 'reservations.id_annonce', '=', 'annonces.id')
        ->groupBy('reservations.id_annonce','reservations.id','reservations.jour_semaine','users.name','users.prenom','users.ville','users.tel','users.email','annonces.titre','annonces.prix')
        ->select('reservations.id_annonce','reservations.id','reservations.jour_semaine','users.name as clientname','users.prenom as clientprenom','users.ville','users.tel','users.email','annonces.titre','annonces.prix')
        ->where('reservations.id',$id)->first();
        // $id_annonce=$demandes->id_annonce;  


        $demande=  Reservation::where('id',$id) 
        ->update(['status' => 'accepte']);

        // $status_annonce=  Annonce::where('id',$id_annonce) 
        // ->update(['status' => 'reserve']);

        $data_partenaire=array('namepart' => $contact_partenaire->name,'prenompart' => $contact_partenaire->prenom ,'tel'=>$contact_partenaire->tel ,'ville'=>$contact_partenaire->ville ,'email'=>$contact_partenaire->email,'titre'=>$demandes->titre,'prix'=>$demandes->prix,'jours'=>$demandes->jour_semaine);

        $data=array('clientname'=>$demandes->clientname,'clientprenom'=>$demandes->clientprenom,'tel'=>$demandes->tel ,'ville'=>$demandes->ville ,'email'=>$demandes->email,'titre'=>$demandes->titre,'prix'=>$demandes->prix,'jours'=>$demandes->jour_semaine);

        Mail::send(
            'emails.refus1',['data' => $data, 'data_partenaire' => $data_partenaire],function($message) use ($data_partenaire,$data){
            $message->from('anashaouat.1@gmail.com',env('APP_NAME'));
            
            $message->to($data_partenaire['email'])->subject('Contact client');
        });
  
        Mail::send(
          'emails.refus',['data' => $data, 'data_partenaire' => $data_partenaire],function($message) use ($data,$data_partenaire) {
          $message->from('anashaouat.1@gmail.com',env('APP_NAME'));
          
          $message->to($data['email'])->subject('Contact partenaire');
      });
         
      return redirect()->back();















/*
        $id_partenaire=Auth::user()->id;
        $contact_partenaire=User::where('id',$id_partenaire)->first();
        $data_partenaire=array('name'=>$contact_partenaire->name,'prenom'=>$contact_partenaire->prenom,'tel'=>$contact_partenaire->tel ,'ville'=>$contact_partenaire->ville ,'email'=>$contact_partenaire->email);

       
        $demande =  DB::table('reservations')
        ->join('users', 'reservations.id_client', '=', 'users.id')
        ->groupBy('reservations.id_annonce','reservations.id','users.name','users.prenom','users.ville','users.tel','users.email')
        ->select('reservations.id_annonce','reservations.id','users.name','users.prenom','users.ville','users.tel','users.email')
        ->where('reservations.id',$id)->first();


        $demandes = Reservation::where('id',$id)->first();
        $demandes=  Reservation::where('id',$id)
        ->update(['status' => 'refuse']);

 $data=array('name'=>$demande->name,'prenom'=>$demande->prenom,'tel'=>$demande->tel ,'ville'=>$demande->ville ,'email'=>$demande->email);

Mail::send(
            ['name' => 'Ahmed'],$data,function($message) use ($data,$data_partenaire){
            $message->from('anashaouat.1@gmail.com',env('APP_NAME'));
            $message->text('Contact du client :<br>'.'nom  :'.$data['name'].'<br>prenom :'.$data['prenom'].'<br>email :'.$data['email'].'<br>numero de téléphone :'.$data['tel']
            .'<br>ville :'.$data['ville']);
            $message->to($data_partenaire['email'])->subject('Refus de la demande de Reservation');
        });

Mail::send(
          ['name' => 'Ahmed'],$data_partenaire,function($message) use ($data,$data_partenaire) {
          $message->from('anashaouat.1@gmail.com',env('APP_NAME'));
          $message->text('Contact du partenaire :'.'nom  :'.$data_partenaire['name'].'prenom :'.$data_partenaire['prenom'].'email :'.$data_partenaire['email'].'numero de téléphone :'.$data_partenaire['tel']
          .'ville :'.$data_partenaire['ville']);
          $message->to($data['email'])->subject('Refus Par partenaire');
      });


        return redirect()->back();
        */

    }

}