<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Moughataa;

class CommuneController extends Controller
{
    public function index()
    {
        $communes = Commune::with('moughataa')->get();
        return view('backend.communes.index-commune', compact('communes'));
    }

    public function create()
    {
        $moughataas = Moughataa::all();
        return view('backend.communes.add-commune', compact('moughataas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_du_commune' => 'required|string|max:255',
            'moughataa_id' => 'required|exists:moughataas,id',
        ]);

        Commune::create($request->all());
        return redirect()->route('communes.index')->with('success', 'Commune créée avec succès.');
    }

    public function edit(Commune $commune)
    {
        $moughataas = Moughataa::all();
        return view('backend.communes.edit-commune', compact('commune', 'moughataas'));
    }

    public function update(Request $request, Commune $commune)
    {
        $request->validate([
            'nom_du_commune' => 'required|string|max:255',
            'moughataa_id' => 'required|exists:moughataas,id',
        ]);

        $commune->update($request->all());
        return redirect()->route('communes.index')->with('success', 'Commune mise à jour avec succès.');
    }

    public function destroy(Commune $commune)
    {
        $commune->delete();
        return redirect()->route('communes.index')->with('success', 'Commune supprimée avec succès.');
    }
}
