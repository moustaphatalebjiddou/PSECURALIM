<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilaya;

class WilayaController extends Controller
{
    public function index()
    {
        $wilayas = Wilaya::all();
        return view('backend.wilaya.all-wilaya', compact('wilayas'));
    }

    public function create()
    {
        return view('backend.wilaya.add-wilaya');
    }

    public function store(Request $request)
    {
        $request->validate([
            'moughataa' => 'required',
            'localite' => 'required',
            'commune' => 'required',
            'nom_du_perimetre' => 'required',
            'nom_du_wilaya' => 'required',
        ]);

        Wilaya::create($request->all());

        return redirect()->route('wilaya.index')->with('success', 'Wilaya ajoutée avec succès');
    }

    public function edit($id)
    {
        $wilaya = Wilaya::find($id);
        return view('backend.wilaya.edit-wilaya', compact('wilaya'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'moughataa' => 'required',
            'localite' => 'required',
            'commune' => 'required',
            'nom_du_perimetre' => 'required',
            'nom_du_wilaya' => 'required',
        ]);

        $wilaya = Wilaya::find($id);
        $wilaya->update($request->all());

        return redirect()->route('wilaya.index')->with('success', 'Wilaya mise à jour avec succès');
    }

    public function destroy($id)
    {
        $wilaya = Wilaya::find($id);
        $wilaya->delete();

        return redirect()->route('wilaya.index')->with('success', 'Wilaya supprimée avec succès');
    }
}
