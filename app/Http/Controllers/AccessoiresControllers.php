<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AccessoiresControllers extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('search')){

            $search = $request->input('search');

            $accessoires = Accessoire::where('id','like',"%$search%")->orWhere('name','like',"%$search%")
            ->orWhere('prix','like',"%$search%")->paginate(4);
        }
        else {
            $accessoires = Accessoire::paginate(7);
        }

        confirmDelete('warning','vous voulez sur supprimer cette accessoire ?');
        return view('admin.all_accessoires',compact('accessoires'));
    }

    public function create()
    {
        return view('admin.create_accessoire');
    }

    public function store(Request $request)
    {
        request()->validate([

            'name' => 'required',
            'prix' => 'required|numeric',

        ]);

        Accessoire::create([
            'name' => strtolower($request->input('name')),
            'prix' => strtolower($request->input('prix')),
        ]);

        Alert::success('Success','Accessoire bien ajouté');
        return redirect()->route('accessoires.index');

    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $accessoire = Accessoire::where('id',$id)->first();

        return view('admin.edit_accessoire',compact('accessoire'));
    }

    public function update(Request $request, string $id)
    {
        request()->validate([
            'name' => 'alpha:ascii',
            'prix' => 'numeric',
        ]);


        Accessoire::where('id',$id)->update([
            'name' => strtolower($request->input('name')),
            'prix' => strtolower($request->input('prix')),
        ]);

        Alert::success('Success','Accessoire bien modifié');
        return redirect()->route('accessoires.index');

    }

    public function destroy(string $id)
    {
        Accessoire::where('id',$id)->delete();

        Alert::success('Success','Accessoire bien supprimé');
        return redirect()->route('accessoires.index');
    }
}
