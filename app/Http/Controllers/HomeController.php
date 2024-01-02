<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == "client" && auth()->user()->genre == "homme"){
            Alert::success('Login','Bienvenue Mr '.auth()->user()->name);
            return redirect()->route('dashboard.index');
        }
        else if(auth()->user()->role == "client" && auth()->user()->genre == "femme"){
            Alert::success('Login','Bienvenue Mme '.auth()->user()->name);
            return redirect()->route('dashboard.index');
        }
        else {
            Alert::success('Login','Bienvenue '.auth()->user()->name);
            return redirect()->route('dashboard_admin');
        }
    }
}
