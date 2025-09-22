<?php

namespace App\Http\Controllers;

use App\Models\CooperativeRizicole;
use App\Models\Wilaya;
use App\Models\Moughataa;
use App\Models\Commune;
use App\Models\Localite;
use App\Models\Perimetre;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CooperativeExport;
use App\Imports\CooperativeRizicoleImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CooperativeRizicoleController extends Controller
{
    // Afficher tous les enregistrements de la table 'cooperativesrizicoles'
    public function index(Request $request)
    {
        // Récupération des critères de recherche
        $search = $request->get('search');

        // Requête avec recherche
        $cooperatives = Cooperativerizicole::when($search, function($query, $search) {
            return $query->where(function ($q) use ($search) {
                // Recherche sur les colonnes de la table 'cooperativesrizicoles'
                $q->where('wilaya_id', 'like', "%{$search}%")
                  ->orWhere('moughataa_id', 'like', "%{$search}%")
                  ->orWhere('commune_id', 'like', "%{$search}%")
                  ->orWhere('localite_id', 'like', "%{$search}%")
                  ->orWhere('perimetre_id', 'like', "%{$search}%")
                  ->orWhere('nom_cooperative', 'like', "%{$search}%")
                  ->orWhere('coordonnees_gps', 'like', "%{$search}%")
                  ->orWhere('type_perimetre', 'like', "%{$search}%")
                  ->orWhere('status_de_lorganisation', 'like', "%{$search}%")
                  ->orWhere('nombre_adherents', 'like', "%{$search}%")
                  ->orWhere('nombre_femme', 'like', "%{$search}%")
                  ->orWhere('nom_du_president', 'like', "%{$search}%")
                  ->orWhere('contact_du_president', 'like', "%{$search}%")
                  ->orWhere('deuxieme_contact', 'like', "%{$search}%")
                  ->orWhere('type_de_document', 'like', "%{$search}%")
                  ->orWhere('annee_creation_de_lexploitation', 'like', "%{$search}%")
                  ->orWhere('superficie_totale', 'like', "%{$search}%")
                  ->orWhere('superficie_emblavee_hivernale', 'like', "%{$search}%")
                  ->orWhere('superficie_emblavee_contre_sais', 'like', "%{$search}%")
                  ->orWhere('nombre_annee_experience', 'like', "%{$search}%")
                  ->orWhere('speculation_principale', 'like', "%{$search}%")
                  ->orWhere('en_campagne_contre_sais_actuelle', 'like', "%{$search}%")
                  ->orWhere('partant_pour_camp_hiver_prochaine', 'like', "%{$search}%")
                  ->orWhere('type_semences_utilises', 'like', "%{$search}%")
                  ->orWhere('variete_de_semences_utilises', 'like', "%{$search}%")
                  ->orWhere('mode_approvisionnement_en_semence', 'like', "%{$search}%")
                  ->orWhere('lieu_approvisionnement', 'like', "%{$search}%")
                  ->orWhere('lieu_stockage_des_semences', 'like', "%{$search}%")
                  ->orWhere('qtite_semence_pour_emblaver', 'like', "%{$search}%")
                  ->orWhere('rendement_moyen_en_hivernage', 'like', "%{$search}%")
                  ->orWhere('rendement_moyen_contre_sais', 'like', "%{$search}%")
                  ->orWhere('qtite_recoltee_en_camp_hiv_022', 'like', "%{$search}%")
                  ->orWhere('qtite_recoltee_en_camp_contre_sais_023', 'like', "%{$search}%")
                  ->orWhere('source_de_financement', 'like', "%{$search}%")
                  ->orWhere('caisse_ou_fond_deroulement', 'like', "%{$search}%")
                  ->orWhere('source_financement_de_la_caisse', 'like', "%{$search}%")
                  ->orWhere('existence_fonds_pour_entr_renou_infra', 'like', "%{$search}%")
                  ->orWhere('bureau_executif', 'like', "%{$search}%")
                  ->orWhere('comment_est_il_structurer', 'like', "%{$search}%")
                  ->orWhere('reglement_interieur', 'like', "%{$search}%")
                  ->orWhere('etat_damenagement_du_perimetre', 'like', "%{$search}%")
                  ->orWhere('evaluation_de_la_fonctionnalite', 'like', "%{$search}%")
                  ->orWhere('source_dirrigation', 'like', "%{$search}%")
                  ->orWhere('type_de_distribution', 'like', "%{$search}%")
                  ->orWhere('type_de_pompage', 'like', "%{$search}%")
                  ->orWhere('nombre_de_gmp', 'like', "%{$search}%")
                  ->orWhere('nombre_de_gmp_fonctionnel', 'like', "%{$search}%")
                  ->orWhere('nombre_station_de_pompage', 'like', "%{$search}%")
                  ->orWhere('nombre_station_pompage_fonctionnel', 'like', "%{$search}%")
                  ->orWhere('type_main_doeuvre_utilise', 'like', "%{$search}%")
                  ->orWhere('organisation_appuyant_les_cooperative', 'like', "%{$search}%")
                  ->orWhere('type_genre_daccompagnement_apporte', 'like', "%{$search}%")
                  ->orWhere('besoin_sujet_prioritaires', 'like', "%{$search}%")
                  ->orWhere('satisfait_de_lorganisation', 'like', "%{$search}%")
                  ->orWhere('motif_dinsatisfaction_de_lorganisation', 'like', "%{$search}%")
                  ->orWhere('accord_sur_contrib__a_haut_de_20_percent', 'like', "%{$search}%")
                  ->orWhere('recommandation_pour_ameliorer_lexploitation', 'like', "%{$search}%")
                  ->orWhere('observsation_generale', 'like', "%{$search}%");

                // Recherche par les colonnes des tables associées
                $q->orWhereHas('perimetre', function($q) use ($search) {
                    $q->where('nom_du_perimetre', 'like', "%{$search}%");
                })
                ->orWhereHas('moughataa', function($q) use ($search) {
                    $q->where('nom_du_moughataa', 'like', "%{$search}%");
                })
                ->orWhereHas('commune', function($q) use ($search) {
                    $q->where('nom_du_commune', 'like', "%{$search}%");
                })
                ->orWhereHas('wilaya', function($q) use ($search) {
                    $q->where('nom_du_wilaya', 'like', "%{$search}%");
                });
            });
        })->paginate(10);
        $wilayas = Wilaya::all();
        // Retourner la vue avec les résultats paginés
        return view('backend.cooperativesrizicoles.index-cooperative', compact('cooperatives','wilayas'));
    }

    public function create()
    {
        $wilayas = Wilaya::all();
        return view('backend.cooperativesrizicoles.add-cooperative', compact('wilayas',));
    }

    // Afficher un enregistrement spécifique de la table 'cooperativesrizicoles' en fonction de son ID
    public function show($id)
    {
        $cooperative = Cooperativerizicole::find($id); // Recherche par ID
        if (!$cooperative) {
            return response()->json(['message' => 'Coopérative non trouvée'], 404);
        }
        return response()->json($cooperative);
    }

    // Créer une nouvelle coopérative rizicole
    public function store(Request $request)
    {
        $request->validate([
            'wilaya_id' => 'required|integer',
            'moughataa_id' => 'required|integer',
            'commune_id' => 'required|integer',
            'localite_id' => 'required|integer',
            'perimetre_id' => 'required|integer',
            'nom_cooperative' => 'required|string|max:255',
            'coordonnees_gps' => 'required|string|max:255',
            'type_perimetre' => 'required|string|max:255',
            'status_de_lorganisation' => 'required|string|max:255',
            'nombre_adherents' => 'required|integer',
            'nombre_femme' => 'required|integer',
            'nom_du_president' => 'required|string|max:255',
            'contact_du_president' => 'required|string|max:255',
            'deuxieme_contact' => 'nullable|string|max:255',
            'type_de_document' => 'nullable|string|max:255',
            'annee_creation_de_lexploitation' => 'required|integer',
            'superficie_totale' => 'required|numeric',
            'superficie_emblavee_hivernale' => 'required|numeric',
            'superficie_emblavee_contre_sais' => 'required|numeric',
            'nombre_annee_experience' => 'required|integer',
            'speculation_principale' => 'nullable|string|max:255',
            'en_campagne_contre_sais_actuelle' => 'required|boolean',
            'partant_pour_camp_hiver_prochaine' => 'required|boolean',
            'type_semences_utilises' => 'nullable|string|max:255',
            'variete_de_semences_utilises' => 'nullable|string|max:255',
            'mode_approvisionnement_en_semence' => 'nullable|string|max:255',
            'lieu_approvisionnement' => 'nullable|string|max:255',
            'lieu_stockage_des_semences' => 'nullable|string|max:255',
            'qtite_semence_pour_emblaver' => 'nullable|numeric',
            'rendement_moyen_en_hivernage' => 'nullable|numeric',
            'rendement_moyen_contre_sais' => 'nullable|numeric',
            'qtite_recoltee_en_camp_hiv_022' => 'nullable|numeric',
            'qtite_recoltee_en_camp_contre_sais_023' => 'nullable|numeric',
            'source_de_financement' => 'nullable|string|max:255',
            'caisse_ou_fond_deroulement' => 'nullable|string|max:255',
            'source_financement_de_la_caisse' => 'nullable|string|max:255',
            'existence_fonds_pour_entr_renou_infra' => 'nullable|boolean',
            'bureau_executif' => 'nullable|string|max:255',
            'comment_est_il_structurer' => 'nullable|string|max:255',
            'reglement_interieur' => 'nullable|string|max:255',
            'etat_damenagement_du_perimetre' => 'nullable|string|max:255',
            'evaluation_de_la_fonctionnalite' => 'nullable|string|max:255',
            'source_dirrigation' => 'nullable|string|max:255',
            'type_de_distribution' => 'nullable|string|max:255',
            'type_de_pompage' => 'nullable|string|max:255',
            'nombre_de_gmp' => 'nullable|integer',
            'nombre_de_gmp_fonctionnel' => 'nullable|integer',
            'nombre_station_de_pompage' => 'nullable|integer',
            'nombre_station_pompage_fonctionnel' => 'nullable|integer',
            'type_main_doeuvre_utilise' => 'nullable|string|max:255',
            'organisation_appuyant_les_cooperative' => 'nullable|string|max:255',
            'type_genre_daccompagnement_apporte' => 'nullable|string|max:255',
            'besoin_sujet_prioritaires' => 'nullable|string|max:255',
            'satisfait_de_lorganisation' => 'required|boolean',
            'motif_dinsatisfaction_de_lorganisation' => 'nullable|string|max:255',
            'accord_sur_contrib__a_haut_de_20_percent' => 'required|boolean',
            'recommandation_pour_ameliorer_lexploitation' => 'nullable|string|max:255',
            'observsation_generale' => 'nullable|string|max:255',
        ]);

        // Création de la coopérative rizicole dans la base de données
        Cooperativerizicole::create($request->all());
        return redirect()->route('cooperativerizicole.index')->with('success', 'cooperative ajoutée avec succès');

    }

    // Mettre à jour une coopérative rizicole existante
    public function update(Request $request, $id)
    {
        $cooperative = Cooperativerizicole::find($id);
        if (!$cooperative) {
            return response()->json(['message' => 'Coopérative non trouvée'], 404);
        }

        $validatedData = $request->validate([
            'wilaya_id' => 'required|integer',
            'moughataa_id' => 'required|integer',
            'commune_id' => 'required|integer',
            'localite_id' => 'required|integer',
            'perimetre_id' => 'required|integer',
            'nom_cooperative' => 'required|string|max:255',
            'coordonnees_gps' => 'required|string|max:255',
            'type_perimetre' => 'required|string|max:255',
            'status_de_lorganisation' => 'required|string|max:255',
            'nombre_adherents' => 'required|integer',
            'nombre_femme' => 'required|integer',
            'nom_du_president' => 'required|string|max:255',
            'contact_du_president' => 'required|string|max:255',
            'deuxieme_contact' => 'nullable|string|max:255',
            'type_de_document' => 'nullable|string|max:255',
            'annee_creation_de_lexploitation' => 'required|integer',
            'superficie_totale' => 'required|numeric',
            'superficie_emblavee_hivernale' => 'required|numeric',
            'superficie_emblavee_contre_sais' => 'required|numeric',
            'nombre_annee_experience' => 'required|integer',
            'speculation_principale' => 'nullable|string|max:255',
            'en_campagne_contre_sais_actuelle' => 'nullable|boolean',
            'partant_pour_camp_hiver_prochaine' => 'nullable|boolean',
            'type_semences_utilises' => 'nullable|string|max:255',
            'variete_de_semences_utilises' => 'nullable|string|max:255',
            'mode_approvisionnement_en_semence' => 'nullable|string|max:255',
            'lieu_approvisionnement' => 'nullable|string|max:255',
            'lieu_stockage_des_semences' => 'nullable|string|max:255',
            'qtite_semence_pour_emblaver' => 'nullable|numeric',
            'rendement_moyen_en_hivernage' => 'nullable|numeric',
            'rendement_moyen_contre_sais' => 'nullable|numeric',
            'qtite_recoltee_en_camp_hiv_022' => 'nullable|numeric',
            'qtite_recoltee_en_camp_contre_sais_023' => 'nullable|numeric',
            'source_de_financement' => 'nullable|string|max:255',
            'caisse_ou_fond_deroulement' => 'nullable|string|max:255',
            'source_financement_de_la_caisse' => 'nullable|string|max:255',
            'existence_fonds_pour_entr_renou_infra' => 'nullable|boolean',
            'bureau_executif' => 'nullable|string|max:255',
            'comment_est_il_structurer' => 'nullable|string|max:255',
            'reglement_interieur' => 'nullable|string|max:255',
            'etat_damenagement_du_perimetre' => 'nullable|string|max:255',
            'evaluation_de_la_fonctionnalite' => 'nullable|string|max:255',
            'source_dirrigation' => 'nullable|string|max:255',
            'type_de_distribution' => 'nullable|string|max:255',
            'type_de_pompage' => 'nullable|string|max:255',
            'nombre_de_gmp' => 'nullable|integer',
            'nombre_de_gmp_fonctionnel' => 'nullable|integer',
            'nombre_station_de_pompage' => 'nullable|integer',
            'nombre_station_pompage_fonctionnel' => 'nullable|integer',
            'type_main_doeuvre_utilise' => 'nullable|string|max:255',
            'organisation_appuyant_les_cooperative' => 'nullable|string|max:255',
            'type_genre_daccompagnement_apporte' => 'nullable|string|max:255',
            'besoin_sujet_prioritaires' => 'nullable|string|max:255',
            'satisfait_de_lorganisation' => 'nullable|boolean',
            'motif_dinsatisfaction_de_lorganisation' => 'nullable|string|max:255',
            'accord_sur_contrib__a_haut_de_20_percent' => 'nullable|boolean',
            'recommandation_pour_ameliorer_lexploitation' => 'nullable|string|max:255',
            'observsation_generale' => 'nullable|string|max:255',
        ]);

        $cooperative->update($validatedData);

        return response()->json($cooperative);
    }

    // Supprimer une coopérative rizicole
    public function destroy($id)
    {
        $cooperative = Cooperativerizicole::find($id);
        if (!$cooperative) {
            return response()->json(['message' => 'Coopérative non trouvée'], 404);
        }

        $cooperative->delete();

        return response()->json(['message' => 'Coopérative supprimée avec succès']);
    }

    public function getMoughataas($wilayaId)
    {
        $moughataas = Moughataa::where('wilaya_id', $wilayaId)->get();
        return response()->json($moughataas);
    }

    public function getCommunes($moughataaId)
    {
        $communes = Commune::where('moughataa_id', $moughataaId)->get();
        return response()->json($communes);
    }

    public function getLocalites($communeId)
    {
        $localites = Localite::where('commune_id', $communeId)->get();
        return response()->json($localites);
    }

    public function getPerimetres($localiteId)
    {
        $perimetres = Perimetre::where('localite_id', $localiteId)->get();
        return response()->json($perimetres);
    }


    public function export()
    {

       return Excel::download(new CooperativeExport, 'Cooperativesrizicoles.xlsx');
    }

    public function exportPdf() {
        $cooperatives = Cooperativerizicole::all();

        // Vérifiez si la vue existe avant de charger le PDF
        if (!view()->exists('backend.cooperativesrizicoles.pdf')) {
            return response()->json(['error' => 'La vue PDF n\'existe pas.'], 404);
        }

        $pdf = PDF::loadView('backend.cooperativesrizicoles.pdf', compact('cooperatives'));
        return $pdf->download('cooperativesrizicoles.pdf');
    }

    public function print_cooperative($id){
        // Récupération de l'cooperative par son ID
        $cooperative = Cooperativerizicole::where('id', $id)->first();

        // Vérifiez si l'cooperative a été trouvé
        if (!$cooperative) {
            return response()->json(['error' => 'cooperative.'], 404);
        }

        // Passez la variable correcte à la vue
        return view('backend.cooperative.print-cooperative', compact('cooperative'));
    }

    public function import()
    {
        Excel::import(new CooperativerizicoleImport, 'cooperativesrizicoles.xlsx');

        return redirect('/index-cooperative')->with('success', 'All good!');
    }

}
