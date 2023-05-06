<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ObjetsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\isSimpleUser;
use App\Http\Middleware\isAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('/welcome');

//anass

//wissal


Route::get('/', [HomeController::class, 'index'])->name('/welcome');
Route::get('/category', [CategoryController::class, 'index'])->name('category');

Route::get('/userInfo/{id}', [UsersController::class,'userInfo'])->name('userInfo');
Route::get('/desactiver_compte', [UsersController::class,'desactiver'])->name('desactiver');

//hajar
Route::middleware( ['auth','isSimpleUser'])->group(function (){

Route::get('/ajouterObjet',[ObjetsController::class,'index'])->name('ajouterObjet');
Route::post('/creerObjet',[ObjetsController::class,'creerObjet'])->name('creerObjet');
Route::get('/liste_objet',[ObjetsController::class,'listerObjets'])->name('liste_objet');
Route::get('/modifier/{id}', [ObjetsController::class,'showModObjetForm'])->name('showModObjetForm');
Route::put('/modObjets/{id}', [ObjetsController::class, 'modObjets'])->name('modObjets');
Route::delete('/delete/{id}', [ObjetsController::class, 'delete'])->name('Delete');



    Route::get('/traiter', [TraitementController::class, 'index'])->name('traiter');
Route::get('/accepter_reservation/{id}', [TraitementController::class, 'accepter_reservation'])->name('accepter_reservation');
Route::get('/refuser_reservation/{id}', [TraitementController::class, 'refuser_reservation'])->name('refuser_reservation');


Route::get('/ajouterAnnonce',[AnnoncesController::class,'index'])->name('ajouterAnnonce');
Route::post('/creerAnnonce',[AnnoncesController::class,'ajouterAnnonce'])->name('creerAnnonce');
Route::get('/mesAnnonces',[AnnoncesController::class,'listerMesAnnonces'])->name('mesAnnonces');
Route::get('/annonceDetails/{id}', [AnnoncesController::class,'annonceDetails'])->name('annonceDetails');
Route::post('/changeStatus', [AnnoncesController::class,'changeStatus'])->name('changeStatus');
Route::get('/louerObjet/{id}', [AnnoncesController::class,'louerObjet'])->name('louerObjet');

Route::post('/deleteAnnonce', [AnnoncesController::class,'destroy'])->name('deleteAnnonce');


Route::post('/modifierAnnonce', [AnnoncesController::class,'update'])->name('modifierAnnonce');
Route::match(['GET', 'POST'], '/getimages', [AnnoncesController::class, 'getImages'])->name('getimages');

    Route::post('/store_review_partenaire/{id}', [ReviewController::class, 'store_review_partenaire'])->name('store_review_partenaire');
Route::get('/review_partenaire', [ReviewController::class, 'index'])->name('review_partenaire');
Route::get('/liste_reservation_partenaire', [ReviewController::class, 'liste_reservation_partenaire'])->name('liste_reservation_partenaire');
Route::get('/add_review_partenaire/{id}', [ReviewController::class, 'add_review_partenaire'])->name('add_review_partenaire');

Route::post('/store_review_client/{id}', [ReviewController::class, 'store_review_client'])->name('store_review_client');
Route::get('/liste_reservation_client', [ReviewController::class, 'liste_reservation_client'])->name('liste_reservation_client');
Route::get('/add_review_client/{id}', [ReviewController::class, 'add_review_client'])->name('add_review_client');

Route::view('/profile/edit', 'profile.edit');

Route::view('/profile/update_password' , 'profile.update_password');



Route::post('/louer', [ReservationController::class,'louer'])->name('louer');

});
// Route::get('/home', function(){
//   return view('home');
// })->name('home');











// mouad admin

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
    
    //category routes
    Route::get('category', [AdminController::class, 'view_category'])->name('admin.category');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::get('/fetchall', [AdminController::class, 'fetchAll'])->name('fetchAll');
    Route::get('/edit', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update', [AdminController::class, 'update'])->name('update');
    
    //utilisateurs routes
    Route::get('utilisateurs', [AdminController::class, 'view_utilisateurs'])->name('admin.utilisateurs');
    Route::get('/fetchAllUtilisateurs', [AdminController::class, 'fetchAllUtilisateurs'])->name('fetchAllUtilisateurs');
    Route::get('/showUtilisateur', [AdminController::class, 'showUtilisateur'])->name('showUtilisateur');
    Route::post('/updateUserStatus', [AdminController::class, 'updateUserStatus'])->name('updateUserStatus');
    
    //reservations routes
    Route::get('reservations', [AdminController::class, 'view_reservations'])->name('admin.reservations');
    Route::get('/fetchAllReservations', [AdminController::class, 'fetchAllReservations'])->name('fetchAllReservations');
    Route::get('/showReservations', [AdminController::class, 'showReservations'])->name('showReservations');
    
    //reviews routes
    Route::get('reviews', [AdminController::class, 'view_reviews'])->name('admin.reviews');
    Route::get('/fetchAllReviews', [AdminController::class, 'fetchAllReviews'])->name('fetchAllReviews');
    Route::get('/showReviews', [AdminController::class, 'showReviews'])->name('showReviews');
    
});