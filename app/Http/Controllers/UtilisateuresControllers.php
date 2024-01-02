<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Voiture;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UtilisateuresControllers extends Controller
{

    public function index()
    {
        
        $client = auth()->user();
        
        if($client == null){
            return view('auth.login');
        }
        else {

            if($client->role == "client"){
                
                $results = Reservation::select(
                    'reservations.id',
                    'voitures.marque',
                    'voitures.model',
                    'reservations.date_debut',
                    'reservations.date_fin',
                    'reservations.total',
                    'reservations.état',
                    'reservations.payement',
                    'reservations.retour',
                    'reservations.total_pénalité',
                    'reservations.retour',
                    'accessoires.name',
                    'reservation_accessoires.quantité'
                )
                ->join('voitures', 'reservations.voiture_id', '=', 'voitures.id')
                ->leftJoin('reservation_accessoires', 'reservations.id', '=', 'reservation_accessoires.reservation_id')
                ->leftJoin('accessoires', 'reservation_accessoires.accessoire_id', '=', 'accessoires.id')
                ->where('reservations.user_id', $client->id)
                ->orderBy('reservations.created_at', 'desc')
                ->get();

                $reservations = [];
            
                foreach ($results as $result) {

                    $reservationId = $result->id;

                    if (!isset($reservations[$reservationId])) {

                        $reservations[$reservationId] = [
                            'id' => $reservationId,
                            'marque' => $result->marque,
                            'model' => $result->model,
                            'date_debut' => $result->date_debut,
                            'date_fin' => $result->date_fin,
                            'total' => $result->total,
                            'état' => $result->état,
                            'payement' => $result->payement,
                            'retour' => $result->retour,
                            'total_pénalité' => $result->total_pénalité,
                            'accessoires' => []
                        ];
                    }
                    if ($result->name && $result->quantité) {
                        $accessoire = [
                            'name' => $result->name,
                            'quantité' => $result->quantité
                        ];
            
                        $reservations[$reservationId]['accessoires'][] = $accessoire;
                    }
                };

                confirmDelete('Warning', 'vous voulez annuler cette reservation ?!');
                return view('dashboard',compact('client','reservations'));

                    // $voitures = DB::table('voitures')->join('reservations', 'voitures.id', '=', 'reservations.voiture_id')
                    //     ->leftJoin('reservation_accessoires', 'reservation_accessoires.reservation_id', '=', 'reservations.id')->distinct()
                    //     ->leftJoin('accessoires', 'reservation_accessoires.accessoire_id', '=', 'accessoires.id')
                    //     ->select('reservations.id', 'voitures.marque', 'voitures.model', 'reservations.date_debut', 'reservations.date_fin','accessoires.name','reservation_accessoires.quantité', 'reservations.total', 'reservations.état')
                    //     ->where('reservations.user_id', $client->id)
                    //     ->orderBy('reservations.created_at', 'desc')
                    //     ->get();
                    // $voiture = Voiture::join('reservations', 'voitures.id', '=', 'reservations.voiture_id')
                    // ->select('voitures.*','reservations.*')
                    // ->get();
        
                    // $columns = Schema::getColumnListing('reservations');
                    // dd($voiture);
                    
            }
            else {
                alert()->error('Error',"vous n'avez pas l'accées à ce site");
                return redirect()->route('dashboard_admin');
            }
        }
    }

    public function profile()
    {
        $client = auth()->user();
        
        if($client == null ){
            return view('auth.login');
        }
        else {
            if($client->role == "client"){
                return view('profile',compact('client'));
            }
            else {
                alert()->error('Error',"vous n'avez pas l'accées à ce site");
                return redirect()->route('dashboard_admin');
            }
        }
    }

    public function all_clients(Request $request)
    {
        if($request->filled('search')){

            $search = $request->input('search');

            $clients = User::whereNull('users.deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('name','like',"%$search%")->orWhere('prenom','like',"%$search%")
                ->orWhere('email','like',"%$search%")->orWhere('age','like',"%$search%")
                ->orWhere('telephone','like',"%$search%")->orWhere('ville','like',"%$search%")
                ->orWhere('cin','like',"%$search%");
            })->paginate(5);

        }
        else {
            $clients = User::where('id','!=',auth()->user()->id)->paginate(7);
        }
        
        confirmDelete('Warning','vous voulez sur supprimer cet client ?');
        return view('admin.all_clients',compact('clients'));
    }

    public function create()
    {
        return view('admin.create_client');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_num|min:6',
            'age' => 'required|numeric|min:23',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'telephone' => 'required|numeric',
            'cin' => 'required|alpha_num',
            'permis' => 'required|alpha_num',
            'genre' => 'required|in:homme,femme',
        ]);

        $user = User::create([
            'name' => strtolower($request->input('name')),
            'prenom' => strtolower($request->input('prenom')),
            'email' => strtolower($request->input('email')),
            'password' => $request->input('password'),
            'role' => 'client',
            'genre' => strtolower($request->input('genre')),
            'age' => strtolower($request->input('age')),
            'adresse' => strtolower($request->input('adresse')),
            'ville' => strtolower($request->input('ville')),
            'telephone' => strtolower($request->input('telephone')),
            'cin' => strtolower($request->input('cin')),
            'permis' => strtolower($request->input('permis')),
            'image_path'=> (strtolower($request->input('genre')) === 'homme') ? 'profile5.jpg' : 'profile_femme.jpg',
        ]);

        if($user){
            Alert::success('Success','Client bien ajouté');
            return redirect()->route('all_clients');
        }
        else {
            Alert::error('Error','Client non ajouté');
            return redirect()->route('create_client');
        }
        
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request,string $id)
    {
        $client = auth()->user(); 

        if($request->email && $request->password)
        {            
            User::where('id',$id)->update([
                'email' => strtolower($request->input('email')),
                'password' => Hash::make($request->input('password')),
            ]);
                    
            Alert::success('Success','votre Email et Password à bien modifié');
            return redirect()->route('dashboard.profile',compact('client'));
        };

        if($request->image != null){
            
            $image = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'),$image);

            User::where('id',$id)->update([
                'name' => strtolower($request->input('name')),
                'prenom' => strtolower($request->input('prenom')),
                'genre' => strtolower($request->input('genre')),
                'age' => strtolower($request->input('age')),
                'adresse' => strtolower($request->input('adresse')),
                'ville' => strtolower($request->input('ville')),
                'telephone' => strtolower($request->input('telephone')),
                'cin' => strtolower($request->input('cin')),
                'permis' => strtolower($request->input('permis')),
                'image_path' => $image,
            ]);
            
            Alert::success('Success','votre profile a été modifié avec success');
            return redirect()->route('dashboard.profile',compact('client'));
        }

        User::where('id',$id)->update([
            'name' => strtolower($request->input('name')),
            'prenom' => strtolower($request->input('prenom')),
            'genre' => strtolower($request->input('genre')),
            'age' => strtolower($request->input('age')),
            'adresse' => strtolower($request->input('adresse')),
            'ville' => strtolower($request->input('ville')),
            'telephone' => strtolower($request->input('telephone')),
            'cin' => strtolower($request->input('cin')),
            'permis' => strtolower($request->input('permis')),
        ]);
        
        Alert::success('Success','votre profile a été modifié avec success');
        return redirect()->route('dashboard.profile',compact('client'));
    }

    public function destroy(string $id)
    {
        User::where('id',$id)->delete();

        Alert::success('Success','client a été supprimé avec success');
        return redirect()->route('all_clients');
    }
}



// if(url()->previous() == $request->fullUrl()){
//     return redirect()->route('/contact');
// }

// Alert::success('Success','votre profile a été modifié avec success');
// ->showConfirmButton('Yes! Delete it', '#3085d6')
// ->showCancelButton('Cancel', '#aaa');
