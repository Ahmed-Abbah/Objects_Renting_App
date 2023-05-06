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

class AnnoncesController extends Controller
{
    public function index()
{   
    $objets= Objet::all()->where('partner_id',Auth::user()->id);
    $categories = Categorie::all();
    foreach($objets as $objet){
        $objet->images=Image::all()->where('id_annonce',$objet->id);
    }
    
    return view('ajouterAnnonce', compact('categories', 'objets'));
}




public function ajouterAnnonce(Request $request)
{   //dd($request);
    $annonce = new Annonce;
    $annonce->id_partenaire = Auth::user()->id;
    $NbrAnnonces = Annonce::where('status', 'enligne')
                      ->where('id_partenaire',Auth::user()->id)
                      ->count();

    if($NbrAnnonces >= 5){
        $annonce->status = "horsligne";
        $message="Annonce enregistré avec succès et mis en attente car vous avez déja 5 annonces en ligne !";
    }else{
        $annonce->status = "enligne";
        $message="Annonce crèèe avec succès et mis en ligne!";
    }
    
    $annonce->titre = $request->input('titre');
    $annonce->description = $request->input('description');
    $annonce->prix = $request->input('prix');
    $annonce->ville = $request->input('ville');

    //TODO:selectionner l'id du l'utilisateur connecté
    
    //* */
    $annonce->id_objet = $request->input('objet');
    

$imageIdsToPublish = $request->input('imagesIds');

// Get all images associated with the id_objet
$allImages = Image::where('id_annonce',$request->input('objet'))->get();

// Loop through all images and delete any that are not in the list of IDs
foreach ($allImages as $Singleimage) {
    foreach ($imageIdsToPublish as $imageToPub) {
    if ($Singleimage->id==$imageToPub) {
        $annonceImages[]=$Singleimage->id;
    }
}
}

if($request->file('images')){
    foreach ($request->file('images') as $image) {
        // generate a unique name for the file
        $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        // store the file with the generated name
        $image->storeAs('public/images/annonce', $fileName);
        // create a new image record in the database
        $newImage = new Image;
        $newImage->id_annonce = $request->input('objet');
        //$newImage->publish = 'yes';
        ;
        $newImage->image = $fileName;
        $newImage->save();
        $annonceImages[]=$newImage->id;
    }
}
$annonce->images = implode(',',$annonceImages);
$annonce->save();
        
$latestAnnonceId = Annonce::selectRaw('max(id) as max_id')->first()->max_id;

// Enregistrement de la disponibilité
if($request->input('jours')){
$jours = $request->input('jours'); 
$disponibilite = new Disponibilite ;
foreach($jours as $jour){
    $joursString = implode(',', $jours); // concatenate days into a string separated by comma
}
    $disponibilite->date_debut=$request->input('dateDebut');
    $disponibilite->date_fin=$request->input('dateFin');
    $disponibilite->min_jour=$request->input('nbrJrsMin');

    $disponibilite->id_annonce=$latestAnnonceId;
    $disponibilite->jour_semaine = $joursString;
    $disponibilite->save();
}else{
    $disponibilite = new Disponibilite ;
    $disponibilite->date_debut=$request->input('dateDebut');
    $disponibilite->date_fin=$request->input('dateFin');
    $disponibilite->min_jour=$request->input('nbrJrsMin');

    $disponibilite->id_annonce=$latestAnnonceId;
    $disponibilite->save();
}
// dd($request);
// dd($NbrAnnonces);
return redirect('ajouterAnnonce')->with('success',$message);
}

// public function listerMesAnnonces()
// {   
//     $mesAnnonces = Annonce::all()->where('id_partenaire',Auth::user()->id);
//     //dd($mesAnnonces);
//     foreach ($mesAnnonces as $annonce) {
        
//         $annonce->images = Image::where('id_annonce', $annonce->id)->get();
//         //dd($annonce->images);
//         $annonce->disponibilite = Disponibilite::where('id_annonce', $annonce->id)->get();
//     }
    
//     return view('mesAnnonces', ['mesAnnonces' => $mesAnnonces]);
// }

public function listerMesAnnonces()
{   
    $mesAnnonces = Annonce::all()->where('id_partenaire', Auth::user()->id);

    foreach ($mesAnnonces as $annonce) {
        // Split the comma-separated list of image IDs into an array
        $listImagesID = explode(',', $annonce->images);

        $imageList = []; // Initialize an array to hold the Image objects

        foreach ($listImagesID as $singleImageID) {
            // Retrieve the Image object with the given ID
            $newImage = Image::find($singleImageID);
            $imageList[] = $newImage; // Add the Image object to the array
        }

        $annonce->images = collect($imageList); // Replace the images attribute with a collection of Image objects

        $annonce->disponibilite = Disponibilite::where('id_annonce', $annonce->id)->get();
    }
    
    return view('mesAnnonces', ['mesAnnonces' => $mesAnnonces]);
}


// public function listerMesAnnonces()
// {   
//     $mesAnnonces = Annonce::all()->where('id_partenaire',Auth::user()->id);
//     //dd($mesAnnonces);
//     foreach ($mesAnnonces as $annonce) {
//         $listImagesID=explode($annonce->images,",");
        
//         foreach($listImagesID as $singleImageID){
//             $newImage= Image::find($singleImageID);
//             $imageList[]=$newImage;
//         }
//         $annonce->images=$imageList;
        
//         //$annonce->images = Image::where('id_annonce', $annonce->id)->get();
//         //dd($annonce->images);
//         $annonce->disponibilite = Disponibilite::where('id_annonce', $annonce->id)->get();
//     }
    
//     return view('mesAnnonces', ['mesAnnonces' => $mesAnnonces]);
// }


public function annonceDetails($id) {

    $objets= Objet::all();
    
    $categories = Categorie::all();
    $annonce = Annonce::find($id);

    $reviews = Review::all();
    $reservations = Reservation::all()->where('id_annonce', $id);

    if ($reservations->count() > 0) {

        foreach ($reservations as $reservation) {
            
            $reviews = Review::all()->where('id_reservation', $reservation->id);

            if ($reviews->count() > 0 ) {

                foreach ($reviews as $review) {
                    $annonce->reviews = $reviews;
                    $annonce->number_comment = $reviews->count();
                    $annonce->note = number_format($reviews->avg('note_client_objet'), 2);
                    
                }

            } else {

                $annonce->reviews = [];
                $annonce->number_comment = 0;
                $annonce->note = 0;

            }
        }

    } else {

        $annonce->reviews = [];
        $annonce->number_comment = 0;
        $annonce->note = 0;

    }


    $listImagesID = explode(',', $annonce->images);
$imageList = [];

foreach($listImagesID as $singleImageID) {
    $newImage = Image::find($singleImageID);
    if ($newImage !== null) {
        $imageList[] = $newImage;
    }
}

$annonce->images = collect($imageList);

    $annonce->disponibilite = Disponibilite::where('id_annonce', $annonce->id)->get();

    $annonce->min_jour = Disponibilite::where('id_annonce', $annonce->id)->first()->min_jour;


    $annonce->date_debut = Disponibilite::where('id_annonce', $annonce->id)->first()->date_debut;
    $annonce->date_fin = Disponibilite::where('id_annonce', $annonce->id)->first()->date_fin;

    $annonce->objet = Objet::where('id', $annonce->id_objet)->first();

    $id_categorie = Objet::where('id', $annonce->id_objet)->first()->id_categorie;

    $annonce->categorie = Categorie::where('id', $id_categorie)->first();
    //dd($annonce->disponibilite);
    return view('annonceDetails', ['annonce' => $annonce, 'categories' => $categories, 'objets' => $objets]);
}




public function changeStatus(Request $request)
{
    $id = $request->input('id');
    $status = $request->input('status');
    $annonce = Annonce::find($id);
    $annonce->status = $status;
    $annonce->update();
    $annonce = Annonce::find($id);
    $annonce->images = Image::where('id_annonce', $annonce->id)->get();
    $annonce->disponibilite = Disponibilite::where('id_annonce', $annonce->id)->get();
    if($annonce->status=="enligne"){
        $html="En ligne";
        $checked=true;
    }else if($annonce->status=="horsligne"){
        $html="Hors ligne";
        $checked=false;
    }
    return response()->json(['success' => true, 'html' => $html, 'checked' => $checked]);
}


public function louerObjet($id){

    $objets= Objet::all();
    $categories = Categorie::all();
    $annonce = Annonce::find($id);

    // $reviews = Review::all()->where('display','yes');
    $reservations = Reservation::all()->where('id_annonce', $id);

    $annonce->objet = Objet::where('id', $annonce->id_objet)->first();
    $id_categorie = Objet::where('id', $annonce->id_objet)->first()->id_categorie;
    $annonce->categorie = Categorie::where('id', $id_categorie)->first();

    $annonce->min_jour = Disponibilite::where('id_annonce', $annonce->id)->first()->min_jour;


    $annonce->date_debut = Disponibilite::where('id_annonce', $annonce->id)->first()->date_debut;
    $annonce->date_fin = Disponibilite::where('id_annonce', $annonce->id)->first()->date_fin;
    $annonce->jour_semaine= Disponibilite::where('id_annonce', $annonce->id)->get();
    //thislinedown
    //$annonce->images = Image::where('id_annonce', $annonce->id)->get();
    //gotchangedwiththisdown
    $listImagesID = explode(',', $annonce->images);

        $imageList = []; // Initialize an array to hold the Image objects

        foreach ($listImagesID as $singleImageID) {
            // Retrieve the Image object with the given ID
            $newImage = Image::find($singleImageID);
            $imageList[] = $newImage; // Add the Image object to the array
        }

        $annonce->images = collect($imageList);

        //thisup
    $annonce->disponibilite = Disponibilite::where('id_annonce', $annonce->id)->get();



    $user_bl = 0;

    $users = []; // create empty array to store users


    if ($reservations->count() > 0) {

        foreach ($reservations as $reservation) {
            
            $reviews = Review::where('id_reservation', $reservation->id)
                  ->where('display', 'yes')
                  ->get();

            if ($reviews->count() > 0 ) {

                foreach ($reviews as $review) {
                    $clientId = $review->id_client;

                    $user = User::find($clientId);

                    if ($user->isBlocked == 1){
                        $user_bl++;
                        continue;
                    }
                    
                    $user->id = $clientId;    
                    $user->name = $user->name;
                    $user->prenom = $user->prenom;
                    $user->profile = $user->profile;


                    $user->data = Review::where('id_client', $clientId)
                    ->where('display', 'yes')
                    ->first();

                    $user->note_client_partenaire = $user->data->note_client_partenaire;
                    $user->commantaire_client_partenaire = $user->data->commantaire_client_partenaire;
                    $user->note_client_objet = $user->data->note_client_objet;
                    $user->commantaire_client_objet = $user->data->commantaire_client_objet;
                    $user->note_partenaire_client = $user->data->note_partenaire_client;
                    $user->commantaire_partenaire_client = $user->data->commantaire_partenaire_client;



                    $annonce->reviews = $reviews;
                    $annonce->number_comment = Review::where('display', 'yes')
                    ->count();

                    $annonce->note = number_format(Review::where('display', 'yes')->avg('note_client_objet'), 2);
                    
                    $users[] = $user;
                }

            } else {

                $annonce->reviews = [];
                $users = [];
                $annonce->number_comment = 0;
                $annonce->note = 0;

            }
        }

    } else {

        $annonce->reviews = [];
        $users = [];
        $annonce->number_comment = 0;
        $annonce->note = 0;

    }

    if($annonce->number_comment == 0){
        $annonce->number_comment = 0;
    } else {
        $annonce->number_comment = $annonce->number_comment - $user_bl;
    }

    // dd($users);
    

    return view('louerObjet',['annonce' => $annonce, 'users' => $users]);
}





public function destroy(Request $request)
{
    $id = $request->input('id');
    $disponibilite = Disponibilite::where('id_annonce', $id)->get();
    foreach($disponibilite as $d){
        $d->delete();
    }

    $images = Image::where("id_annonce",$id)->get();
    foreach($images as $image){
        $image->delete();
    }

    $annonce = Annonce::find($id);
    $annonce->delete();

    return response()->json(['success' => true]);
}


public function update(Request $request){
    // dd($request);
    // Annonce Update
    $annonce = Annonce::find($request->annonce_id);
    $annonce->titre = $request->input('titre');
    $annonce->description = $request->input('description');
    $annonce->prix = $request->input('prix');
    $annonce->ville = $request->input('ville');
    $annonce->id_objet = $request->input('objet');
    $annonce->update();

    //if the user has selected new images
    if($request->file('images')){
            //delete previous images from storage 
            // Fetch the images that were uploaded for the given annonce_id
            $images = Image::where('id_annonce', $request->annonce_id)->get();

            foreach ($images as $image) {
                // Delete the image file from the storage
                Storage::delete('public/images/annonce/' . $image->image);
            }

            // Remove all the corresponding database records
            Image::where('id_annonce', $request->annonce_id)->delete();
            //TO DO 
            //Upload new Images
            foreach ($request->file('images') as $image) {
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/annonce', $fileName);
                $newImage =new Image ;
                $newImage->image = $fileName;
                $newImage->id_annonce = $request->annonce_id;
                $newImage->save();
            }
    }


    $oldDisponibilites = Disponibilite::where('id_annonce', $request->annonce_id)->get();
    foreach ($oldDisponibilites as $oldDisponibilite) {
    if ($oldDisponibilite->min_jour != $request->input('nbrJrsMin') ||  $oldDisponibilite->date_fin != $request->input('dateFin') || $oldDisponibilite->date_debut != $request->input('dateDebut')) {
        foreach ($oldDisponibilites as $oldDisponibilite) {
            $oldDisponibilite->date_debut = $request->input('dateDebut');
            $oldDisponibilite->date_fin = $request->input('dateFin');
            $oldDisponibilite->min_jour = $request->input('nbrJrsMin');

            $oldDisponibilite->update();
        }
    }
    }

    if ($request->input('jours')) {
        // Remove all the corresponding database records
        Disponibilite::where('id_annonce', $request->annonce_id)->delete();
        $disponibilite = new Disponibilite;
        // Upload new Disponibilite
        $jours = $request->input('jours'); 
        foreach ($jours as $jour) {
            $joursString = implode(',', $jours); // concatenate days into a string separated by comma
        }
            $disponibilite->id_annonce = $request->annonce_id;
            $disponibilite->date_debut = $request->input('dateDebut');
            $disponibilite->date_fin = $request->input('dateFin');
            $disponibilite->min_jour = $request->input('nbrJrsMin');
            $disponibilite->jour_semaine = $joursString;
            $disponibilite->save();
    } 
        
            
        
    
    
        return redirect()->route('annonceDetails', $request->annonce_id)->with('success', 'The annonce has been modified.');
    //    return redirect()->route('annonce.details', $request->annonce_id);
}  

public function getImages(Request $request)
{
    // Get the selected objet_id from the request
    $objetId = $request->input('objet_id');
    $imagesHtml = '';
    // Retrieve the corresponding object from the database
    $objet = Objet::find($objetId);
    if(!is_null($objet)){
        $objet->images=Image::all()->where('id_annonce',$objet->id);
    if (!is_null($objet->images)) {
        foreach ($objet->images as $image) {
            $imagesHtml .= '<div style="border: 2px solid #ddd; padding: 10px; display: inline-block; margin: 10px; position: relative;">';
            $imagesHtml .= '<label style="position: absolute; top: -10px; right: -10px;">';
            $imagesHtml .= '<input type="checkbox" name="imagesIds[]" value="'. $image->id .'" style="display: none;">';
            $imagesHtml .= '</label>';
            $imagesHtml .= '<img src="'. asset('storage/images/annonce/' . $image->image) . '" alt="'. $image->image .'" width="200" style="cursor: pointer;">';
            $imagesHtml .= '<div class="selected-text" style="position: absolute; top: 50%; left: 50%; background-color: rgba(0, 255, 0, 0.5); color: white; padding: 5px; display: none;transform: translate(-50%, -50%);">';
            $imagesHtml .= '<i class="bi bi-check">Selectionné</i>';
            $imagesHtml .= '</div>';
            $imagesHtml .= '</div>';
        }
        $imagesHtml .= '<br>';
        $imagesHtml .= '<div style="border: 2px solid #ddd; padding: 10px; display:none; margin: 10px; position: relative;">';
            $imagesHtml .= '<label style="position: absolute; top: -10px; right: -10px;">';
            $imagesHtml .= '<input type="checkbox" name="imagesIds[]" value="'. $image->id .'" style="display: none;">';
            $imagesHtml .= '</label>';
            $imagesHtml .= '<img src="'. asset('storage/images/annonce/' . $image->image) . '" alt="'. $image->image .'" width="200" style="cursor: pointer;">';
            $imagesHtml .= '<div class="selected-text" style="position: absolute; top: 50%; left: 50%; background-color: rgba(0, 255, 0, 0.5); color: white; padding: 5px; display: none;">';
            $imagesHtml .= '<i class="bi bi-check">Selectionné</i>';
            $imagesHtml .= '</div>';
            $imagesHtml .= '</div>';
    }
    }

    // Generate the HTML for the images container
    

    // Return the HTML for the images container as the response
    return $imagesHtml;
}






}