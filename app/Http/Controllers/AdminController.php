<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Objet;
use App\Models\Annonce;
use App\Models\Image;
use App\Models\Categorie;
use App\Models\Disponibilite;
use App\Models\Review;
use App\Models\Reservation;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function index()
    {
        $number_user = User::where('isAdmin', '0')->count();
        $number_category = Categorie::count();

        $number_annonces_enligne = Annonce::where('status', 'enligne')->count();
        $number_annonces_horsligne = Annonce::where('status', 'horsligne')->count();
        $number_annonces_reserve = Annonce::where('status', 'reserve')->count();

        $data_annonces_enligne = ($number_annonces_enligne*100)/($number_annonces_enligne+$number_annonces_horsligne+$number_annonces_reserve);
        $data_annonces_horsligne = ($number_annonces_horsligne*100)/($number_annonces_enligne+$number_annonces_horsligne+$number_annonces_reserve);
        $data_annonces_reserve = ($number_annonces_reserve*100)/($number_annonces_enligne+$number_annonces_horsligne+$number_annonces_reserve);


        $number_reservations_terminees = Reservation::where('status', 'accepte')->count();
        $number_reservations_attente = Reservation::where('status', 'attente')->count();
        
        $data_reservations_terminees =  ($number_reservations_terminees*100)/($number_reservations_terminees+$number_reservations_attente);
        $data_reservations_attente =  ($number_reservations_attente*100)/($number_reservations_terminees+$number_reservations_attente);

        $number_reviews = Review::count();



        return view('admin.home', compact('number_user', 'number_category', 'number_annonces_enligne', 
        'number_annonces_horsligne', 'number_annonces_reserve', 
        'number_reservations_terminees', 'number_reservations_attente',
        'number_reviews', 'data_annonces_enligne', 'data_annonces_horsligne',
        'data_reservations_terminees', 'data_reservations_attente', 'data_annonces_reserve'));
    }

    public function view_category()
    {
        return view('admin.inc.category');
    }

    public function view_reservations()
    {
        return view('admin.inc.reservations');
    }

    public function view_utilisateurs()
    {
        return view('admin.inc.utilisateurs');
    }

    public function view_reviews()
    {
        return view('admin.inc.reviews');
    }


    //insert employee ajax request
    public function store(Request $request){

        $empDat = [
            'nom_categorie' => $request->name_category
        ];

        Categorie::create($empDat);

        return response()->json([
            'status' => 200
        ]);
        
    }



    //handle fetch all Categorie ajax request
    public function fetchAll () {

        $emps = Categorie::all();
        $output = '';
        if( $emps->count() > 0 ){

            $output .= '<table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Categorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($emps as $emp){
                    $output .= '<tr>
                        <td>'. $emp->id. '</td>
                        <td>'. $emp->nom_categorie . '</td>
                        <td>
                            <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                        </td>
                    </tr>';
                }

                $output .= '</tbody></table>';

                echo $output;
        }
        else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }

    }


    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Categorie::find($id);
		return response()->json($emp);
	}


    // handle update an employee ajax request
	public function update(Request $request) {
		$emp = Categorie::find($request->emp_id);

		$empData = ['nom_categorie' => $request->name_category];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}
















    //gestion des utilisateurs
    public function fetchAllUtilisateurs () {

        $emps = User::all()->where('isAdmin','0');
        $output = '';
        if( $emps->count() > 0 ){

            $output .= '<table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($emps as $emp){
                    $output .= '<tr>
                        <td>'. $emp->id . '</td>
                        <td>'. $emp->name . '</td>
                        <td>'. $emp->prenom . '</td>
                        <td>'. $emp->email . '</td>
                        <td>'. $emp->tel . '</td>
                        <td>
                            <a href="#" id="' . $emp->id . '" class="text-success mx-1 showUtilisateur" data-bs-toggle="modal" data-bs-target="#showUtilisateurModal"><i class="bi bi-eye h4"></i></a>
                        </td>
                    </tr>';
                }

                $output .= '</tbody></table>';

                echo $output;
        }
        else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }

    }


    // handle edit an employee ajax request
	public function showUtilisateur(Request $request) {
		$id = $request->id;
		$emp = User::find($id);
		return response()->json($emp);
	}


    
    










    

    //gestion des Reservations
    public function fetchAllReservations () {

        $emps = Reservation::all();
        $output = '';
        if( $emps->count() > 0 ){

            $output .= '<table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom client</th>
                        <th>Nom partenaire</th>
                        <th>Statut</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                <tbody>';

                foreach($emps as $emp){

                    $user = User::find($emp->id_client);
                    $annonce = Annonce::find($emp->id_annonce);
                    $user_name = $user->name . ' ' . $user->prenom;

                    $partenaire = User::find($annonce->id_partenaire);
                    $partenaire_name = $partenaire->name . ' ' . $partenaire->prenom;
                    
                    $output .= '<tr>
                    <td>'. $emp->id . '</td>
                        <td>'. $user_name . '</td>
                        <td>'. $partenaire_name . '</td>
                        <td>'. $emp->status . '</td>
                        <td>
                        <a href="#" id="' . $emp->id . '" class="text-success mx-1 showReservations" data-bs-toggle="modal" data-bs-target="#showReservationsModal"><i class="bi bi-eye h4"></i></a>
                        </td>
                    </tr>';
                }

                $output .= '</tbody></table>';

                echo $output;
        }
        else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
        
    }


    // handle edit an employee ajax request
    public function showReservations(Request $request) {
        $id = $request->id;
        $reservation = Reservation::find($id);
        $annonce = Annonce::find($reservation->id_annonce);
        $objet = Objet::find($annonce->id_objet);
        $categorie = Categorie::find($objet->id_categorie);
        return response()->json([$reservation, $annonce, $objet, $categorie]); // Return response as JSON array
    }
    
    










    
    
    
    
    
    //gestion des Reviews
    public function fetchAllReviews () {

        $emps = Review::all();
        $output = '';
        if( $emps->count() > 0 ){
            
            $output .= '<table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom client</th>
                        <th>Nom partenaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
                
                foreach($emps as $emp){

                    $user = User::find($emp->id_client);
                    $user_name = $user->name . ' ' . $user->prenom;

                    $partenaire = User::find($emp->id_partenaire);
                    $partenaire_name = $partenaire->name . ' ' . $partenaire->prenom;

                    $output .= '<tr>
                        <td>'. $emp->id . '</td>
                        <td>'. $user_name . '</td>
                        <td>'. $partenaire_name . '</td>
                        <td>
                            <a href="#" id="' . $emp->id . '" class="text-success mx-1 showReviews" data-bs-toggle="modal" data-bs-target="#showReviewsModal"><i class="bi bi-eye h4"></i></a>
                        </td>
                    </tr>';
                }

                $output .= '</tbody></table>';

                echo $output;
            }
            else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }

    }


    // handle edit an employee ajax request
	public function showReviews(Request $request) {
		$id = $request->id;
		$emp = Review::find($id);
		return response()->json($emp);
	}
    
    
    
    
    
    
    
}
