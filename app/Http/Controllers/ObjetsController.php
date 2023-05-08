<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Objet;
use App\Models\Annonce;
use App\Models\Image;
use App\Models\Reservation;
use App\Models\Categorie;
use App\Models\Disponibilite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ObjetsController extends Controller
{
    public function index()
{   
    $objets= Objet::all();
    $categories = Categorie::all();
    return view('ajouterObjet', compact('categories', 'objets'));
}



public function creerObjet(Request $request)
{   //enregistrement de l'objet
    $objet = new Objet;
    $message="Objet Ajouté";
    $user= Auth::user()->id;
    
    $objet->nom_objet = $request->input('titre');
    $objet->id_categorie = $request->input('categorie');
    $objet->partner_id = $user;
    $objet->etat_c = $request->input('etat_c');

    

    $objet->save();

    $latestObjetId = objet::selectRaw('max(id) as max_id')->first()->max_id;

    if($request->file('images')){
        foreach ($request->file('images') as $image) {
            // generate a unique name for the file
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // store the file with the generated name
            $image->storeAs('public/images/annonce', $fileName);
            // create a new image record in the database
            $newImage = new Image;
            $newImage->id_annonce = $latestObjetId;
            $newImage->image = $fileName;
            $newImage->save();
        }
    }

    return redirect('liste_objet')->with('success',$message);
}


  
public function listerObjets()
{   
    $user= Auth::user()->id;

    $Objets = Objet::where('partner_id', $user)->get();
    return view('liste_objet', ['Objets' => $Objets]);
}

public function showModObjetForm($id)
{
    $objet = Objet::findOrFail($id);
    $categories = Categorie::all();
    return view('modObjets', compact('objet', 'categories'));
}

public function delete($id)
{
    $annonces = Annonce::where('id_objet', $id)->get();
    foreach($annonces as $annonce){
        $disponibilites=Disponibilite::where('id_annonce',$annonce->id)->get();
        foreach($disponibilites as $disponibilite){
            $disponibilite->delete();
        }
        $reservations=Reservation::where('id_annonce',$annonce->id)->get();
        foreach($reservations as $reservation){
            $reservation->delete();
        }
        $annonce->delete();
    }
    $images = Image ::where('id_annonce',$id)->get();
    foreach($images as $image){
        $image->delete();
    }
    $objet = Objet::find($id);
    $objet->delete();
    
    return redirect()->back()->with('success', 'Objet supprimé avec succès');
}


public function modObjets(Request $request, $id)
{
    $objet = Objet::findOrFail($id);
    $objet->nom_objet = $request->input('nom_objet');
    $objet->id_categorie = $request->input('id_categorie');
    $objet->etat_c = $request->input('etat_c');
    $objet->save();

if($request->file('images')){
            //delete previous images from storage 
            // Fetch the images that were uploaded for the given annonce_id
            $images = Image::where('id_annonce', $id)->get();

            foreach ($images as $image) {
                // Delete the image file from the storage
                Storage::delete('public/images/annonce/' . $image->image);
            }

            // Remove all the corresponding database records
            Image::where('id_annonce', $id)->delete();
            //TO DO 
            //Upload new Images
            foreach ($request->file('images') as $image) {
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/annonce', $fileName);
                $newImage =new Image ;
                $newImage->image = $fileName;
                $newImage->id_annonce = $id;
                $newImage->save();
            }
    }

    return redirect()->route('liste_objet');
}


}