<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localite;
use App\Models\Commune;

class LocaliteController extends Controller
{
    public function index()
    {
        $localites = Localite::with('commune')->get();
        return view('backend.localites.index-localite', compact('localites'));
    }

    public function create()
    {
        $communes = Commune::all();
        return view('backend.localites.add-localite', compact('communes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_du_localite' => 'required|string|max:255',
            'commune_id' => 'required|exists:communes,id',
        ]);

        Localite::create($request->all());
        return redirect()->route('localites.index')->with('success', 'Localité créée avec succès.');
    }

    public function edit(Localite $localite)
    {
        $communes = Commune::all();
        return view('backend.localites.edit-localite', compact('localite', 'communes'));
    }

    public function update(Request $request, Localite $localite)
    {
        $request->validate([
            'nom_du_localite' => 'required|string|max:255',
            'commune_id' => 'required|exists:communes,id',
        ]);

        $localite->update($request->all());
        return redirect()->route('localites.index')->with('success', 'Localité mise à jour avec succès.');
    }

    public function destroy(Localite $localite)
    {
        $localite->delete();
        return redirect()->route('localites.index')->with('success', 'Localité supprimée avec succès.');
    }
}
