<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perimetre;
use App\Models\Localite;

class PerimetreController extends Controller
{
    public function index()
    {
        $perimetres = Perimetre::with('localite')->get();
        return view('backend.perimetres.index-perimetre', compact('perimetres'));
    }


    public function create()
    {
        $localites = Localite::all();
        return view('backend.perimetres.add-perimetre', compact('localites'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom_du_perimetre' => 'required|string|max:255',
            'localite_id' => 'required|exists:localites,id',
        ]);

        Perimetre::create($request->all());

        return redirect()->route('perimetres.index')->with('success', 'Périmètre créé avec succès.');
    }


    public function edit(Perimetre $perimetre)
    {
        $localites = Localite::all();
        return view('backend.perimetres.edit-perimetre', compact('perimetre', 'localites'));
    }

    public function update(Request $request, Perimetre $perimetre)
    {
        $request->validate([
            'localite_id' => 'required|exists:localites,id',
            'nom_du_perimetre' => 'required|string|max:255',
        ]);

        $perimetre->update($request->all());
        return redirect()->route('perimetres.index')->with('success', 'Périmètre mis à jour avec succès.');
    }

    public function destroy(Perimetre $perimetre)
    {
        $perimetre->delete();
        return redirect()->route('perimetres.index')->with('success', 'Périmètre supprimé avec succès.');
    }
}
