<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Voiture;
use App\Models\Reservation;
// use App\Models\Reservation_accessoire;
use App\Models\Accessoire;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReservationsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$immatriculation)
    {
        request()->validate([
            'date_debut' => 'before:date_fin',        
            'date_fin' => 'after:date_debut'
        ]);
        
        $accessoire = Accessoire::all();

        $client = User::where("id",auth()->user()->id)->first();

            // if($client != null){

            $voiture = Voiture::where('immatriculation',$immatriculation)->where('état','disponible')->first();
            
            if($voiture == null){

                Alert::error('Error','la voiture avec cette matricule n\'est pas disponible');
                return redirect()->route('voitures.index');
            }
            else{

                $reservationsCount = Reservation::where('user_id', $client->id)
                ->whereDate('created_at', now()->toDateString())->count();

                if ($reservationsCount >= 3) {

                    Alert::error('Error','Vous avez atteint la limite de réservations pour aujourd\'hui');
                    return back();
                }
                else{

                    $details_reservation = request()->all();

                    $date_debut = Carbon::parse(request()->input('date_debut'))->format('d/m/Y');
                    $date_fin = Carbon::parse(request()->input('date_fin'))->format('d/m/Y');
                    
                    $date1 = Carbon::parse(request()->input('date_debut'));
                    $date2 = Carbon::parse(request()->input('date_fin'));
                    $duration = $date2->diffInDays($date1);
                    
                    $total = $duration * $voiture->prix_par_jour; 
                    
                    return view("reservation", compact("voiture","details_reservation","date_debut","date_fin","duration","client","accessoire"));
                }        
            }

            // }
            // else {

            //     $voiture = Voiture::where('immatriculation',$immatriculation)->where('état','disponible')->first();
        
            //     if($voiture == null){

            //         Alert::error('Error','la voiture avec cette matricule n\'est pas disponible');
            //         return redirect()->route('voitures.index');
            //     }
            //     else {

            //         $details_reservation = request()->all();
                
            //         $date_debut = Carbon::parse(request()->input('date_debut'))->format('d/m/Y');
            //         $date_fin = Carbon::parse(request()->input('date_fin'))->format('d/m/Y');
                    
            //         $date1 = Carbon::parse(request()->input('date_debut'));
            //         $date2 = Carbon::parse(request()->input('date_fin'));
            //         $duration = $date2->diffInDays($date1);
                    
            //         $total = $duration * $voiture->prix_par_jour; 
                    
            //         return view("reservation", compact("voiture","details_reservation","date_debut","date_fin","duration","accessoire","client"));
        
            //     }
            // }
    }

    public function all_reservations(Request $request)
    {
        if($request->filled('search')){

            $search = $request->input('search');
                        
            $reservations = DB::table('reservations')->join('voitures', 'voitures.id', '=', 'reservations.voiture_id')
            ->join('users','users.id','=','reservations.user_id')
            ->select('reservations.id', 'users.name', 'users.prenom', 'voitures.model', 'reservations.date_debut', 
            'reservations.date_fin', 'reservations.total', 'reservations.état','reservations.payement','reservations.retour','reservations.total_pénalité')
            ->whereNull('reservations.deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('reservations.id', 'like', "%$search%")->orWhere('users.name', 'like', "%$search%")
                    ->orWhere('users.prenom', 'like', "%$search%")->orWhere('voitures.model', 'like', "%$search%")
                    ->orWhere('reservations.date_debut', 'like', "%$search%")
                    ->orWhere('reservations.date_fin', 'like', "%$search%")
                    ->orWhere('reservations.total', 'like', "%$search%")
                    ->orWhere('reservations.état', 'like', "%$search%")
                    ->orWhere('reservations.payement', 'like', "%$search%")
                    ->orWhere('reservations.retour', 'like', "%$search%")
                    ->orWhere('reservations.total_pénalité', 'like', "%$search%");
            })
            ->orderBy('reservations.created_at', 'desc')->paginate(5);
        }
        else { 
            $reservations = DB::table('reservations')->join('voitures', 'voitures.id', '=', 'reservations.voiture_id')
            ->join('users','users.id','=','reservations.user_id')
            ->select('reservations.id', 'users.name', 'users.prenom', 'voitures.model', 'reservations.date_debut', 'reservations.date_fin', 'reservations.total', 'reservations.état',
            'reservations.payement','reservations.retour','reservations.total_pénalité')->whereNull('reservations.deleted_at')
            ->orderBy('reservations.created_at', 'desc')->paginate(5);
        }
        
        confirmDelete('Warning', 'vous voulez supprimer cette reservation ?!');
        return view('admin.all_reservations',compact('reservations'));
    }

    public function create()
    {

        $accessoires = Accessoire::all();
        $voitures = Voiture::where('état','disponible')->orderBy('marque')->orderBy('model')->get();
        $clients = User::where('role','client')->orderBy('name')->orderBy('prenom')->get();

        return view('admin.create_reservation',compact('clients','voitures','accessoires'));
    }

    public function store(Request $request,$immatriculation)
    {
        request()->validate([
            'date_debut' => 'before:date_fin',        
            'date_fin' => 'after:date_debut',
        ]);

        $gps = Accessoire::where('id',$request->input('gps'))->first();
        $child = Accessoire::where('id',$request->input('seat_child_id'))->first();

        $user = User::find(auth()->user()->id);

        $voiture = Voiture::where('immatriculation',$immatriculation)->where('état','disponible')->first();


        if($voiture == null){
            Alert::error('Error','la voiture avec cette matricule n\'est pas disponible');
            return redirect()->route('voitures.index');
        }
        else {

            $reservationsCount = Reservation::where('user_id', $user->id)
            ->whereDate('created_at', now()->toDateString())->count();
            
            
            if ($reservationsCount >= 3) {

                Alert::error('Error','Vous avez atteint la limite de réservations pour aujourd\'hui');
                return redirect()->route('voitures.index');
            }
            else {

                $date1 = Carbon::parse($request->input('date_debut'));
                $date2 = Carbon::parse($request->input('date_fin'));
                $duration = $date2->diffInDays($date1);

                if($request->input('gps') == null && $request->input('seat_child') == 0 )
                {
                    $total = $duration * $voiture->prix_par_jour;
                }
                else if($request->input('gps') != null && $request->input('seat_child') == 0 )
                {
                    $total = ($duration * $voiture->prix_par_jour) + $gps->prix;
                }
                else if($request->input('gps') == null && $request->input('seat_child') != 0 )
                {
                    $total = ($duration * $voiture->prix_par_jour) + ($request->input('seat_child') * $child->prix * $duration );
                }
                else {
                    $total = ($duration * $voiture->prix_par_jour) + $gps->prix + ($request->input('seat_child') * $child->prix * $duration );
                };
                
                $reservation = Reservation::create([
                    'user_id' => $user->id,
                    'voiture_id' => $voiture->id,
                    'date_debut' => $request->input('date_debut'),
                    'date_fin' => $request->input('date_fin'),
                    'total' => $total,
                    'état' => '50%',
                    'payement' => 'non',
                    'retour' => 'en cours'
                ]);
                
                $voiture->état = 'réservé';
                $voiture->save();

                if($request->input('gps') != null && $request->input('seat_child') == 0 )
                {
                    $reservation->reservationAccessoires()->create([
                        'accessoire_id' => $gps->id,
                        'quantité' => 1
                    ]);
                }
                else if($request->input('gps') == null && $request->input('seat_child') != 0 )
                {
                    $reservation->reservationAccessoires()->create([
                        'accessoire_id' => $child->id,
                        'quantité' => $request->input('seat_child')
                    ]);
                }
                else if($request->input('gps') != null && $request->input('seat_child') != 0 ){

                    $reservation->reservationAccessoires()->createMany([
                        [
                            'accessoire_id' => $gps->id,
                            'quantité' => 1
                        ],
                        [
                            'accessoire_id' => $child->id,
                            'quantité' => $request->input('seat_child')
                        ]
                    ]);
     
                };
                
                Alert::success('Success','votre réservation effectuée avec succès');
                return redirect()->route('dashboard.index');
            }
        }
    }

    public function ajouter(Request $request){

        request()->validate([
            'user_id' => 'required',
            'voiture_id' => 'required',
            'date_debut' => 'required|before:date_fin',        
            'date_fin' => 'required|after:date_debut',
            'état' => 'required',
            'payement' => 'required',
        ]);

        $gps = Accessoire::where('id',$request->input('gps'))->first();
        $child = Accessoire::where('id',$request->input('seat_child_id'))->first();
        
        $voiture = Voiture::where('id',$request->input('voiture_id'))->first();
        
        $reservationsCount = Reservation::where('user_id', $request->input('user_id'))
        ->whereDate('created_at', now()->toDateString())->count();
        
        
        if ($reservationsCount >= 3) {

            Alert::error('Error','Vous avez atteint la limite de réservations pour aujourd\'hui');
            return redirect()->route('all_reservations');
        }
        else {

            $date1 = Carbon::parse($request->input('date_debut'));
            $date2 = Carbon::parse($request->input('date_fin'));
            $duration = $date2->diffInDays($date1);

            if($request->input('gps') == null && $request->input('seat_child') == 0 )
            {
                $total = $duration * $voiture->prix_par_jour;
            }
            else if($request->input('gps') != null && $request->input('seat_child') == 0 )
            {
                $total = ($duration * $voiture->prix_par_jour) + $gps->prix;

            }
            else if($request->input('gps') == null && $request->input('seat_child') != 0 )
            {
                $total = ($duration * $voiture->prix_par_jour) + ($request->input('seat_child') * $child->prix * $duration );

            }
            else {
                $total = ($duration * $voiture->prix_par_jour) + $gps->prix + ($request->input('seat_child') * $child->prix * $duration );

            };
            
            $reservation = Reservation::create([
                'user_id' => $request->input('user_id'),
                'voiture_id' => $request->input('voiture_id'),
                'date_debut' => $request->input('date_debut'),
                'date_fin' => $request->input('date_fin'),
                'total' => $total,
                'état' => $request->input('état'),
                'payement' => $request->input('payement'),
                'retour' => 'en cours',
            ]);
            
            $voiture->état = 'réservé';
            $voiture->save();

            if($request->input('gps') != null && $request->input('seat_child') == 0 )
            {
                $reservation->reservationAccessoires()->create([
                    'accessoire_id' => $gps->id,
                    'quantité' => 1
                ]);
            }
            else if($request->input('gps') == null && $request->input('seat_child') != 0 )
            {
                $reservation->reservationAccessoires()->create([
                    'accessoire_id' => $child->id,
                    'quantité' => $request->input('seat_child')
                ]);
            }
            else if($request->input('gps') != null && $request->input('seat_child') != 0 ){

                $reservation->reservationAccessoires()->createMany([
                    [
                        'accessoire_id' => $gps->id,
                        'quantité' => 1
                    ],
                    [
                        'accessoire_id' => $child->id,
                        'quantité' => $request->input('seat_child')
                    ]
                ]);
    
            };
            
            Alert::success('Success','votre réservation effectuée avec succès');
            return redirect()->route('all_reservations');
        }

    }


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $reservation = Reservation::where('id',$id)->first();
        
        return view('admin.edit_reservation',compact('reservation'));

    }

    public function update(Request $request, string $id)
    {
        Reservation::where('id',$id)->update([
            'total' => $request->input('total'),
            'état' => $request->input('état'),
            'payement' => $request->input('payement'),
            'retour' => $request->input('retour'),
            'total_pénalité' => $request->input('pénalité'),
        ]);

        $reservation_id = Reservation::where('id',$id)->first();
        $voiture = Voiture::where('id',$reservation_id->voiture_id)->first();
        
        if($reservation_id->retour == "retourné"){
            $voiture->état = 'disponible';
            $voiture->save();
        }
        else if($reservation_id->retour == "en cours"){
            $voiture->état = 'réservé';
            $voiture->save();
        }
                
        Alert::success('Success','Réservation à bien modifié');
        return redirect()->route('all_reservations');

    }

    public function destroy(string $id)
    {
        $reservation = Reservation::where('id',$id)->first();
        $voiture = Voiture::where('id',$reservation->voiture_id)->first();

        Reservation::where('id',$id)->delete();

        $voiture->état = 'disponible';
        $voiture->save();

        if(auth()->user()->role == 'admin'){
            Alert::success('Success', 'Réservation bien supprimée');
            return redirect()->route('all_reservations');    
        }
        Alert::success('Success', 'Réservation bien supprimée');
        return redirect()->route('dashboard.index');
    }

}


    // $reservations = DB::table('reservations')->join('voitures', 'voitures.id', '=', 'reservations.voiture_id')
    // ->join('users','users.id','=','reservations.user_id')
    // ->select('reservations.id', 'users.name', 'users.prenom', 'voitures.model', 'reservations.date_debut', 'reservations.date_fin', 'reservations.total', 'reservations.état')
    // ->where('reservations.id','like',"%$search%")->orWhere('users.name','like',"%$search%")
    // ->orWhere('users.prenom','like',"%$search%")->orWhere('voitures.model','like',"%$search%")
    // ->orWhere('reservations.date_debut','like',"%$search%")->orWhere('reservations.date_fin','like',"%$search%")
    // ->orWhere('reservations.total','like',"%$search%")->orWhere('reservations.état','like',"%$search%")
    // ->paginate(5);


    // Reservation_accessoire::create([
    //     'reservation_id' => $reservation->id,
    //     'accessoire_id' => $gps->id,
    //     'quantité' => "1"
    // ]);

