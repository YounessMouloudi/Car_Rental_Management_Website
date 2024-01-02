<?php

use App\Http\Controllers\AccessoiresControllers;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

use App\Http\Controllers\VoituresControllers;

use App\Http\Controllers\ReservationsControllers;

use App\Http\Controllers\UtilisateuresControllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\ClientMiddleware;

use App\Http\Middleware\AdminMiddleware;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Route::get('/contact/envoie', [PagesController::class, 'contacterAgence'])->name('contacterAgence');

Route::resource('/voitures', VoituresControllers::class)->except(['show']);

Route::get('/search_voitures', [VoituresControllers::class,'show'])->name('search_voitures');

Route::get('/voitures/details/{immatriculation}', [VoituresControllers::class,'details_voiture'])->name('details');


Route::middleware([ClientMiddleware::class])->group(function () {

    Route::get('/dashboard', [UtilisateuresControllers::class,'index'])->name('dashboard.index');

    Route::get('/dashboard/profile', [UtilisateuresControllers::class,'profile'])->name('dashboard.profile');

    Route::patch('/dashboard/profile/{id}', [UtilisateuresControllers::class,'update'])->name('dashboard.update');

    Route::delete('/dashboard/{id}', [ReservationsControllers::class,'destroy'])->name('suppression');

});

Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/admin/dashboard', [PagesController::class,'home'])->name('dashboard_admin');


    Route::get('/admin/dashboard/all_reservations', [ReservationsControllers::class,'all_reservations'])->name('all_reservations');

    Route::post('/admin/dashboard/reservations/ajouter', [ReservationsControllers::class,'ajouter'])->name('nv_reservation');
        
    Route::resource('/admin/dashboard/reservations', ReservationsControllers::class);

    
    Route::resource('/admin/dashboard/accessoires', AccessoiresControllers::class);


    Route::get('/admin/dashboard/all_cars', [VoituresControllers::class,'all_cars'])->name('all_cars');

    Route::resource('/admin/dashboard/cars', VoituresControllers::class);


    Route::get('/admin/dashboard/clients', [UtilisateuresControllers::class,'all_clients'])->name('all_clients');

    Route::get('/admin/dashboard/clients/create', [UtilisateuresControllers::class,'create'])->name('create_client');
    
    Route::post('/admin/dashboard/clients/store', [UtilisateuresControllers::class,'store'])->name('store_client');
    
    Route::delete('/admin/dashboard/clients/{id}', [UtilisateuresControllers::class,'destroy'])->name('delete_client');
    

});

Route::middleware(['auth'])->group(function () {

    Route::get('/voitures/details/{immatriculation}/reservation', [ReservationsControllers::class,'index'])->name('details_reservation');
    
    Route::get('/voitures/reservation/{immatriculation}', [ReservationsControllers::class,'index'])->name('reservation');

    Route::post('/voitures/reservation/{immatriculation}', [ReservationsControllers::class,'store'])->name('save');
    
});


Route::get('/contrat/pdf/{id}', [PagesController::class, 'downloadPdf'])->name('pdf');

// Route::get('/pdf/{id}', [PagesController::class, 'pdf']);

Route::get('/connexion', [PagesController::class, 'connexion']);

// Route::get('/route', [PagesController::class, 'retourVoiture']);

Route::get('/mail', function(){
    $user = new User();
    Mail::to('younex94@gmail.com')->send(new SendMail());
});

Route::fallback([PagesController::class, 'notFound'])->name('404');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
