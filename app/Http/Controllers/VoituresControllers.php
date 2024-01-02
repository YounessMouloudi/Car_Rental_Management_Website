<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

use App\Models\Voiture;

use DB;
use RealRashid\SweetAlert\Facades\Alert;

class VoituresControllers extends Controller
{

    public function index()
    {

        $voitures = Voiture::paginate(5);
        $marques =  Voiture::distinct()->pluck("marque")->sort();
        $transmission =  Voiture::distinct()->pluck("transmission")->sort();
        $carburant =  Voiture::distinct()->pluck("type_carburant")->sort();
        $prix =  Voiture::distinct()->pluck("prix_par_jour")->sort();

        $prix_min = Voiture::pluck("prix_par_jour")->min();
        $prix_max = Voiture::pluck("prix_par_jour")->max();

        return view('voitures', compact(["voitures","marques","prix_min","prix_max","transmission","carburant","prix"]));
    }

    public function all_cars(Request $request)
    {
        if($request->filled('search')){

            $search = $request->input('search');

            $voitures = Voiture::whereNull('voitures.deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('model','like',"%$search%")->orWhere('marque','like',"%$search%")
                ->orWhere('immatriculation','like',"%$search%")->orWhere('année','like',"%$search%")
                ->orWhere('transmission','like',"%$search%")->orWhere('type_carburant','like',"%$search%")
                ->orWhere('prix_par_jour','like',"%$search%")->orWhere('état','like',"%$search%");
            })
            ->paginate(5);            
        }
        else {
            $voitures = Voiture::paginate(7);
        }

        confirmDelete('Warning','vous voulez supprimer cette car ?');
        return view('admin.all_cars',compact('voitures'));
    }

    public function create()
    {
        return view('admin.create_car');
    }

    public function store(Request $request)
    {
        request()->validate([
            'model' => 'required',
            'marque' => 'required',
            'immatriculation' => 'required',
            'année' => 'required',
            'transmission' => 'required',
            'type_carburant' => 'required',
            'portes' => 'required',
            'places' => 'required',
            'bagages' => 'required',
            'prix_par_jour' => 'required',
            'assurance' => 'required',
            'état' => 'required|in:disponible,réservé',
            'pénalité' => 'required|numeric',
            'image' => 'required',
            'description' => 'required'
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'),$image);

        Voiture::create([

            'model' => $request->input('model'),
            'marque' => $request->input('marque'),
            'immatriculation' => $request->input('immatriculation'),
            'année' => $request->input('année'),
            'transmission' => $request->input('transmission'),
            'type_carburant' => $request->input('type_carburant'),
            'portes' => $request->input('portes'),
            'places' => $request->input('places'),
            'bagages' => $request->input('bagages'),
            'prix_par_jour' => $request->input('prix_par_jour'),
            'assurance' => $request->input('assurance'),
            'état' => $request->input('état'),
            'pénalité' => $request->input('pénalité'),
            'image_path' => $image,
            'description' => $request->input('description'),

        ]);

        Alert::success('Success','voiture bien ajoutée');
        return redirect()->route('all_cars');

    }

    public function show()
    {

        $search_marques = request()->input('marque');
        $search_transmission = request()->input('transmission');
        $search_carburant = request()->input('carburant');
        $search_prix = request()->input('prix');

        $marques =  Voiture::distinct()->pluck("marque")->sort();
        $transmission =  Voiture::distinct()->pluck("transmission")->sort();
        $carburant =  Voiture::distinct()->pluck("type_carburant")->sort();
        $prix =  Voiture::distinct()->pluck("prix_par_jour")->sort();

        $prix_min = Voiture::pluck("prix_par_jour")->min();
        $prix_max = Voiture::pluck("prix_par_jour")->max();

        // $prix_max = DB::table("voitures")->max('prix_par_jour');
        
        $Params = request()->except('page');


        if($search_marques == null && $search_carburant == null && $search_transmission == null && $search_prix == null){

            $voitures = Voiture::paginate(5);
            
            return view('voitures', compact(["voitures","marques","prix_min","prix_max","transmission","carburant","prix"]));
        }
        else if($search_marques && $search_transmission && !$search_carburant && !$search_prix){

            $voitures = Voiture::where('marque',$search_marques)->where('transmission',$search_transmission)
            ->paginate(3)->appends($Params);

            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_marques && $search_carburant && !$search_transmission && !$search_prix){

            $voitures = Voiture::where('marque',$search_marques)->where('type_carburant',$search_carburant)
            ->paginate(3)->appends($Params);

            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_marques && $search_prix && !$search_transmission && !$search_carburant){

            $voitures = Voiture::where('marque',$search_marques)->where('prix_par_jour',$search_prix)
            ->paginate(3)->appends($Params);

            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_carburant && $search_transmission && !$search_marques && !$search_prix){

            $voitures = Voiture::where('type_carburant',$search_carburant)->where('transmission',$search_transmission)
            ->paginate(3)->appends($Params);
            
            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_prix && $search_transmission && !$search_marques && !$search_carburant){

            $voitures = Voiture::where('prix_par_jour',$search_prix)->where('transmission',$search_transmission)
            ->paginate(3)->appends($Params);
            
            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_prix && $search_carburant && !$search_marques && !$search_transmission){

            $voitures = Voiture::where('prix_par_jour',$search_prix)->where('type_carburant',$search_carburant)
            ->paginate(3)->appends($Params);
            
            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_marques && $search_carburant && $search_transmission && !$search_prix){

            $voitures = Voiture::where('marque',$search_marques)->where('type_carburant',$search_carburant)
            ->where('transmission',$search_transmission)->paginate(3)->appends($Params);

            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_marques && $search_carburant && $search_prix && !$search_transmission){

            $voitures = Voiture::where('marque',$search_marques)->where('type_carburant',$search_carburant)
            ->where('prix_par_jour',$search_prix)->paginate(3)->appends($Params);

            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_marques && $search_prix && $search_transmission && !$search_carburant){

            $voitures = Voiture::where('marque',$search_marques)->where('prix_par_jour',$search_prix)
            ->where('transmission',$search_transmission)->paginate(3)->appends($Params);

            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_prix && $search_carburant && $search_transmission && !$search_marques){

            $voitures = Voiture::where('prix_par_jour',$search_prix)->where('type_carburant',$search_carburant)
            ->where('transmission',$search_transmission)->paginate(3)->appends($Params);

            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else if($search_marques && $search_carburant && $search_transmission && $search_prix){

            $voitures = Voiture::where('marque',$search_marques)->where('type_carburant',$search_carburant)
            ->where('transmission',$search_transmission)->where('prix_par_jour',$search_prix)
            ->paginate(3)->appends($Params);
            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }
        else{

            $voitures = Voiture::where('marque',$search_marques)->orWhere('transmission',$search_transmission)
            ->orWhere('type_carburant',$search_carburant)->orWhere('prix_par_jour',$search_prix)
            ->paginate(3)->appends($Params);    
            
            return view('search_voitures', compact("voitures","marques","prix_min","prix_max","transmission","carburant","prix"));
        }

    }

    public function details_voiture($immatriculation)
    {           
        $accessoires = Accessoire::all();

        $voiture = Voiture::where('immatriculation',$immatriculation)->first();
        
        $voitures_similaires = Voiture::where('marque', $voiture->marque)->where('id', '!=', $voiture->id)->limit(3)->get();

        if($voiture === null){
            return view('404');
        }
        return view("details", compact("voiture","accessoires","voitures_similaires"));

    }

    public function details_reservation($immatriculation)
    {
        request()->validate([
            'date_debut' => 'required|before:date_fin',        
            'date_fin' => 'required|after:date_debut',
        ]);

        $voiture = Voiture::where('immatriculation',$immatriculation)->first();
        $details_reservation = request()->all();

            if($voiture === null){
                return view('404');
            }
    
            return view("reservation", compact("voiture"));
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $voiture = Voiture::where('id',$id)->first();
        
        $marques = Voiture::distinct()->pluck("marque")->sort();
        $transmissions =  Voiture::distinct()->pluck("transmission")->sort();
        $carburants =  Voiture::distinct()->pluck("type_carburant")->sort();
        $assurances =  Voiture::distinct()->pluck("assurance")->sort();
        $états =  Voiture::distinct()->pluck("état")->sort();

        return view('admin.edit_car',compact('voiture','marques','transmissions','carburants','assurances','états'));
    }

    public function update(Request $request, string $id)
    {
        if($request->image != null){
            
            $image = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'),$image);

            Voiture::where('id',$id)->update([

                'model' => $request->input('model'),
                'marque' => $request->input('marque'),
                'immatriculation' => $request->input('immatriculation'),
                'année' => $request->input('année'),
                'transmission' => $request->input('transmission'),
                'type_carburant' => $request->input('type_carburant'),
                'portes' => $request->input('portes'),
                'places' => $request->input('places'),
                'bagages' => $request->input('bagages'),
                'prix_par_jour' => $request->input('prix_par_jour'),
                'assurance' => $request->input('assurance'),
                'état' => $request->input('état'),
                'pénalité' => $request->input('pénalité'),
                'image_path' => $image,
                'description' => $request->input('description'),

            ]);

            Alert::success('Success','voiture bien modifiée');
            return redirect()->route('all_cars');
    
        }

        Voiture::where('id',$id)->update([

            'model' => $request->input('model'),
            'marque' => $request->input('marque'),
            'immatriculation' => $request->input('immatriculation'),
            'année' => $request->input('année'),
            'transmission' => $request->input('transmission'),
            'type_carburant' => $request->input('type_carburant'),
            'portes' => $request->input('portes'),
            'places' => $request->input('places'),
            'bagages' => $request->input('bagages'),
            'prix_par_jour' => $request->input('prix_par_jour'),
            'assurance' => $request->input('assurance'),
            'état' => $request->input('état'),
            'pénalité' => $request->input('pénalité'),
            'description' => $request->input('description'),

        ]);

        Alert::success('Success','voiture bien modifiée');
        return redirect()->route('all_cars');

    }

    public function destroy(string $id)
    {
        Voiture::where('id',$id)->delete();
        
        Alert::success('Success','voiture bien supprimée');
        return redirect()->route('all_cars');
    }
}
