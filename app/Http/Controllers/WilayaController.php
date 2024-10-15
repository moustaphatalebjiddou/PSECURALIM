<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilaya;

class WilayaController extends Controller
{
    public function index()
    {
        $wilayas = Wilaya::all();
        return view('backend.wilayas.index-wilaya', compact('wilayas'));
    }

    public function create()
    {
        return view('backend.wilayas.add-wilaya');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_du_wilaya' => 'required|string|max:255',
        ]);

        Wilaya::create($request->all());
        return redirect()->route('wilayas.index')->with('success', 'Wilaya créée avec succès.');
    }

    public function edit(Wilaya $wilaya)
    {
        return view('backend.wilayas.edit-wilaya', compact('wilaya'));
    }

    public function update(Request $request, Wilaya $wilaya)
    {
        $request->validate([
            'nom_du_wilaya' => 'required|string|max:255',
        ]);

        $wilaya->update($request->all());
        return redirect()->route('wilayas.index')->with('success', 'Wilaya mise à jour avec succès.');
    }

    public function destroy(Wilaya $wilaya)
    {
        $wilaya->delete();
        return redirect()->route('wilayas.index')->with('success', 'Wilaya supprimée avec succès.');
    }
}
