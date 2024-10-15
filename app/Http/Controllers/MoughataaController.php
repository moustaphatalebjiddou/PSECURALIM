<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moughataa;
use App\Models\Wilaya;

class MoughataaController extends Controller
{
    public function index()
    {
        $moughataas = Moughataa::with('wilaya')->get();
        return view('backend.moughataas.index-moughataa', compact('moughataas'));
    }

    public function create()
    {
        $wilayas = Wilaya::all();
        return view('backend.moughataas.add-moughataa', compact('wilayas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_du_moughataa' => 'required|string|max:255',
            'wilaya_id' => 'required|exists:wilayas,id',
        ]);

        Moughataa::create($request->all());
        return redirect()->route('moughataas.index')->with('success', 'Moughataa créée avec succès.');
    }

    public function edit(Moughataa $moughataa)
    {
        $wilayas = Wilaya::all();
        return view('backend.moughataas.edit-moughataa', compact('moughataa', 'wilayas'));
    }

    public function update(Request $request, Moughataa $moughataa)
    {
        $request->validate([
            'nom_du_moughataa' => 'required|string|max:255',
            'wilaya_id' => 'required|exists:wilayas,id',
        ]);

        $moughataa->update($request->all());
        return redirect()->route('moughataas.index')->with('success', 'Moughataa mise à jour avec succès.');
    }

    public function destroy(Moughataa $moughataa)
    {
        $moughataa->delete();
        return redirect()->route('moughataas.index')->with('success', 'Moughataa supprimée avec succès.');
    }
}
