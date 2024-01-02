<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Reservation;
use App\Models\ReservationAccessoire;
use Barryvdh\DomPDF\Facade\PDF as PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Database\QueryException;
// use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    public function index(){

        try {
            DB::table('voitures')->exists();

            $sessionKey = 'retourExecutée';

            if (!session()->has($sessionKey)) {

                $this->retourVoiture();
    
                session()->put($sessionKey, true);
            }
    
            $voitures = Voiture::latest()->whereNull('voitures.deleted_at')->where('état','disponible')->take(6)->get();
    
            return view('index',compact('voitures'));
        
        } catch (QueryException $e) {
            return view('mysql_erreur',compact('e'));
        }
    }
    public function contact(){
        return view('contact');
    }

    public function contacterAgence(Request $request){
        
        request()->validate([
            'full_name' => 'required',        
            'email' => 'required|email',
            'subject' => 'required|in:information,réclamation',
            'telephone' => 'required|min:10|max:10',
            'message' => 'required|min:10',
        ]);

        if(auth()->user() != null){
            
            dd('aaaa');
        }
        else {
            dd(request()->input());
        }
        // return view('contact');
    }

    public function notFound(){
        return view('404');
    }

    public function retourVoiture(){
                
        $reservations = Reservation::all();
        

        foreach($reservations as $reservation){

            $reservation_id = Reservation::where('id',$reservation->id)->first();
            $voiture_id = Voiture::where('id',$reservation_id->voiture_id)->first();
            

            if ($reservation) {

                $datefin = Carbon::parse($reservation->date_fin);
                $dateNow = Carbon::parse(now()->toDateString());

                if ($dateNow->greaterThan($datefin) && $reservation->retour == "en cours") {
                                        
                    $joursRetard = $dateNow->diffInDays($datefin);
                    
                    $penalité = $voiture_id->pénalité;
                    $penalitéTotal = $joursRetard * $penalité;

                    $reservation->total_pénalité += $penalitéTotal;
                    $reservation->save();
    
                } 
                
                if(($dateNow->greaterThan($datefin) && $reservation->retour == "retourné") || ($dateNow->lte($datefin) && $reservation->retour == "retourné") ){
                    
                    $voiture_id->état = "disponible";
                    $voiture_id->save();
                }
            }
        }
    }

    public function home(){

        $admin = auth()->user();
        
        if($admin == null){
            return view('auth.login');
        }
        else {

            if($admin->role == "admin"){

                $week = Carbon::today()->subDays(7);
                
                $reservations = DB::table('reservations')->join('voitures', 'voitures.id', '=', 'reservations.voiture_id')
                ->join('users','users.id','=','reservations.user_id')
                ->select('reservations.id', 'users.name', 'users.prenom', 'voitures.model', 'reservations.date_debut', 'reservations.date_fin', 'reservations.total',
                 'reservations.état','reservations.payement','reservations.retour','reservations.total_pénalité')
                ->whereNull('reservations.deleted_at')->whereDate('reservations.created_at', '>=', $week)
                ->orderBy('reservations.created_at', 'desc')->paginate(5);
                
        
                $voitures = Voiture::select('voitures.image_path','voitures.model', 'voitures.marque','voitures.transmission','voitures.type_carburant','voitures.année')
                    ->join('reservations', 'reservations.voiture_id', '=', 'voitures.id')
                    ->whereNull('voitures.deleted_at')
                    ->groupBy('voitures.image_path','voitures.model', 'voitures.marque','voitures.transmission','voitures.type_carburant','voitures.année')
                    ->havingRaw('COUNT(reservations.id) >= 2')
                    ->orderByRaw('COUNT(reservations.id) DESC')->distinct()->paginate(7);
                            
                return view("admin.home_admin",compact('reservations','voitures'));
            }
            else {
                Alert::error('Error','vous etes pas admin pour accéder a ce site');
                return redirect()->route('dashboard.index');
            }
        }

    }

    public function connexion(){
        return view('mysql_erreur');
    }

    // public function pdf($reservation_Id){

    //     $client = auth()->user();
        
    //     if($client == null){
    //         return view('auth.login');
    //     }
    //     else {

    //         if($client->role == "client"){
                
    //             $reservation = Reservation::where('id',$reservation_Id)->first();

    //             $voiture = Voiture::where('id',$reservation->voiture_id)->first();

    //             $accessoires = ReservationAccessoire::select(
    //                 'accessoires.name',
    //                 'reservation_accessoires.quantité'

    //             )->join('reservations','reservations.id','reservation_accessoires.reservation_id')
    //             ->leftJoin('accessoires', 'reservation_accessoires.accessoire_id', '=', 'accessoires.id')
    //             ->where('reservations.user_id', $client->id)
    //             ->where('reservations.id', $reservation_Id)->get();

    //             $date1 = Carbon::parse($reservation->date_debut);
    //             $date2 = Carbon::parse($reservation->date_fin);
    //             $duration = $date2->diffInDays($date1);

    //             return view('pdf',compact('client','reservation','voiture','accessoires','duration'));
                    
    //         }
    //         else {
    //             alert()->error('Error',"vous n'avez pas l'accées à ce site");
    //             return redirect()->route('dashboard_admin');
    //         }
    //     }
    // }

    public function downloadPdf($reservationId){
        
        $client = auth()->user();
        
        if($client == null){
            return view('auth.login');
        }
        else {

            if($client->role == "client"){
                
                $reservation = Reservation::findOrFail($reservationId);
                // $reservation = Reservation::where('id',$reservationId)->first();

                $voiture = Voiture::where('id',$reservation->voiture_id)->first();

                $accessoires = ReservationAccessoire::select(
                    'accessoires.name',
                    'reservation_accessoires.quantité'

                )->join('reservations','reservations.id','reservation_accessoires.reservation_id')
                ->leftJoin('accessoires', 'reservation_accessoires.accessoire_id', '=', 'accessoires.id')
                ->where('reservations.user_id', $client->id)
                ->where('reservations.id', $reservationId)->get();

                // dd($accessoires->isEmpty());

                $date1 = Carbon::parse($reservation->date_debut);
                $date2 = Carbon::parse($reservation->date_fin);
                $duration = $date2->diffInDays($date1);

                $pdf = PDF::loadView('pdf',compact('client','reservation','voiture','accessoires','duration'));
                return $pdf->download("contrat_location_".$reservation->id."_".$client->name."_".$client->prenom.".pdf");
    
            }
            else {
                // alert()->error('Error',"vous n'avez pas l'accées à ce site");
                // return redirect()->route('dashboard_admin');

                return view('404');
            }
        }
    }

    public function createPdf(){
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pdf'));
        $dompdf->setPaper('A4');
        $dompdf->render();

        return $dompdf->stream('mon_pdf.pdf');
    }

}
