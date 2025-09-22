<?php
namespace App\Http\Controllers;


use App\Models\Wilaya;
use App\Models\Moughataa;
use App\Models\Commune;
use App\Models\Localite;
use App\Models\Perimetre;
use App\Models\IdentificationIrrigue;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IdentificationIrrigueExport;
use Barryvdh\DomPDF\Facade\Pdf;

class IdentificationIrrigueController extends Controller
{
    public function index(Request $request)
    {
          // Récupération des critères de recherche
    $search = $request->get('search');

    // Requête avec recherche
    $identifications = IdentificationIrrigue::when($search, function($query, $search) {
        return $query->where(function ($q) use ($search) {
            // Rechercher par les colonnes de identification_irrigues
            $q->where('date_amenagement', 'like', "%{$search}%")
              ->orWhere('superficie_mise_en_valeur', 'like', "%{$search}%")
              ->orWhere('nombre_adherents', 'like', "%{$search}%")
              ->orWhere('nombre_homme', 'like', "%{$search}%")
              ->orWhere('nombre_femme', 'like', "%{$search}%")
              ->orWhere('recepisse_reconnaissance', 'like', "%{$search}%")
              ->orWhere('nom_du_dirigeant_strc_exploitant', 'like', "%{$search}%")
              ->orWhere('telephone', 'like', "%{$search}%")
              ->orWhere('date_regul_stru_exploitant', 'like', "%{$search}%")
              ->orWhere('date_denquete', 'like', "%{$search}%")
              ->orWhere('date_de_mise_en_valeur', 'like', "%{$search}%")
              ->orWhere('nature_de_l_organisation', 'like', "%{$search}%")
              ->orWhere('propriete_terrain', 'like', "%{$search}%")
              ->orWhere('loue_a_qui', 'like', "%{$search}%")
              ->orWhere('loue_quel_prix', 'like', "%{$search}%")
              ->orWhere('loue_pour_combien_de_temps', 'like', "%{$search}%")
              ->orWhere('loue_par_contrat', 'like', "%{$search}%")
              ->orWhere('prete_par_qui', 'like', "%{$search}%")
              ->orWhere('prete_conditions', 'like', "%{$search}%")
              ->orWhere('prete_pour_combien_de_temps', 'like', "%{$search}%")
              ->orWhere('prete_par_contrat', 'like', "%{$search}%")
              ->orWhere('peut_vendre_a_etrangers', 'like', "%{$search}%")
              ->orWhere('peut_vendre_a_membres', 'like', "%{$search}%")
              ->orWhere('peut_preter_a_etrangers', 'like', "%{$search}%")
              ->orWhere('peut_louer_a_membres', 'like', "%{$search}%")
              ->orWhere('nombre_etrangers_cultivant', 'like', "%{$search}%")
              ->orWhere('etrangers_acquis_droit_par_achat', 'like', "%{$search}%")
              ->orWhere('etrangers_acquis_droit_par_location', 'like', "%{$search}%")
              ->orWhere('etrangers_acquis_droit_par_pret', 'like', "%{$search}%")
              ->orWhere('etrangers_acquis_droit_par_heritage', 'like', "%{$search}%")
              ->orWhere('droit_coutumier_informel_de_la_collectivite', 'like', "%{$search}%")
              ->orWhere('membre_de_la_collectivite', 'like', "%{$search}%")
              ->orWhere('droit_resultant_certificat_propriete_par_hakem_de', 'like', "%{$search}%")
              ->orWhere('par_le_wali_de', 'like', "%{$search}%")
              ->orWhere('num_titre_foncier', 'like', "%{$search}%")
              ->orWhere('date_du', 'like', "%{$search}%")
              ->orWhere('delivre_par', 'like', "%{$search}%")
              ->orWhere('occupation_irreguliere_du_domaine_de_etat', 'like', "%{$search}%")
              ->orWhere('domaine_des_particuliers_etat', 'like', "%{$search}%")
              ->orWhere('demande_non_encore_adressee', 'like', "%{$search}%")
              ->orWhere('demande_adressee_mais_sans_reponse', 'like', "%{$search}%")
              ->orWhere('demande_examinee_par_commission_moughataa_de', 'like', "%{$search}%")
              ->orWhere('aspects_eco_sociaux', 'like', "%{$search}%")
              ->orWhere('organe_de_gestion', 'like', "%{$search}%")
              ->orWhere('djamaa', 'like', "%{$search}%")
              ->orWhere('chef_village', 'like', "%{$search}%")
              ->orWhere('par_rachat', 'like', "%{$search}%")
              ->orWhere('par_voie_heritage', 'like', "%{$search}%")
              ->orWhere('nombre_femmes_exploitantes', 'like', "%{$search}%")
              ->orWhere('payent_elles_nature', 'like', "%{$search}%")
              ->orWhere('payent_elles_espece', 'like', "%{$search}%")
              ->orWhere('payent_elles_un_loyer', 'like', "%{$search}%")
              ->orWhere('payent_elles_un_rempechen', 'like', "%{$search}%")
              ->orWhere('payent_elles_assakal', 'like', "%{$search}%")
              ->orWhere('speculations_pratiquees', 'like', "%{$search}%")
              ->orWhere('rendement_par_spec_a_hectare', 'like', "%{$search}%")
              ->orWhere('variete_de_semences', 'like', "%{$search}%")
              ->orWhere('cycle_speculations', 'like', "%{$search}%")
              ->orWhere('benefi_credit_etat_institutions_specialisees', 'like', "%{$search}%")
              ->orWhere('contracte_credit_banque_privee', 'like', "%{$search}%")
              ->orWhere('demande_credit_banque_privee', 'like', "%{$search}%");

            // Rechercher par les colonnes des tables associées

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
            })
            ;
        });
    })->paginate(10);

   //     $identifications = IdentificationIrrigue::all();
        return view('backend.identification_irrigues.index-identification-irrigues', compact('identifications'));
    }

    public function create()
    {
        $wilayas = Wilaya::all();
        return view('backend.identification_irrigues.add-identification-irrigues', compact('wilayas'));
    }

    public function store(Request $request)
    {
       // dd($request->all()); // Pour voir les données envoyées
        // Reste de votre logique...
        $request->validate([
            'wilaya_id' => 'required|exists:wilayas,id',
            'moughataa_id' => 'required|exists:moughataas,id',
            'commune_id' => 'required|exists:communes,id',
            'localite_id' => 'required|exists:localites,id',
            'perimetre_id' => 'required|exists:perimetres,id',
            'date_amenagement' => 'required|date',
            'superficie_mise_en_valeur' => 'required|string|max:255',
            'nombre_adherents' => 'required|numeric',
            'nombre_homme'=> 'required|numeric',
            'nombre_femme'=> 'required|numeric',
            'recepisse_reconnaissance' => 'required|string|max:255',
            'nom_du_dirigeant_strc_exploitant' => 'required|string',
            'telephone' => 'required|numeric',
            'date_regul_stru_exploitant'=> 'required|date',
            'date_denquete'=> 'required|date',
            'date_de_mise_en_valeur' => 'required|date',
            'vocation_du_perimetre' => 'nullable|array',
            'nature_de_l_organisation' => 'required|string',
            'propriete_terrain' => 'required|in:collective,individuelle',
            'mode_acquisition' => 'nullable|array',
            'loue_a_qui' => 'nullable|string',
            'loue_quel_prix' => 'nullable|string',
            'loue_pour_combien_de_temps' => 'nullable|string',
            'loue_par_contrat' => 'nullable|string',
            'prete_par_qui' => 'nullable|string',
            'prete_conditions' => 'nullable|string',
            'prete_pour_combien_de_temps' => 'nullable|string',
            'prete_par_contrat' => 'nullable|string',
            'peut_vendre_a_etrangers' => 'nullable|string',
            'peut_vendre_a_membres' => 'nullable|string',
            'peut_preter_a_etrangers' => 'nullable|string',
            'peut_louer_a_membres' => 'nullable|string',
            'nombre_etrangers_cultivant' => 'nullable|integer',
            'etrangers_acquis_droit_par_achat' => 'nullable|string',
            'etrangers_acquis_droit_par_location' => 'nullable|string',
            'etrangers_acquis_droit_par_pret' => 'nullable|string',
            'etrangers_acquis_droit_par_heritage' => 'nullable|string',
            'droit_exploitation_perimetre' => 'nullable|array',
            'droit_coutumier_informel_de_la_collectivite' => 'nullable|string',
            'membre_de_la_collectivite' => 'nullable|string' ,
            'droit_resultant_concession_provisoire' => 'nullable|string',
            'domaine_prive_de_etat' => 'nullable|string',
            'droit_resultant_certificat_propriete_par_hakem_de' => 'nullable|string',
            'par_le_wali_de' => 'nullable|string',
            'num_titre_foncier' => 'nullable|string|max:255',
            'date_du' => 'nullable|date',
            'delivre_par' => 'nullable|string',
            'occupation_irreguliere_du_domaine_de_etat' => 'nullable|string',
            'domaine_des_particuliers_etat' => 'nullable|string',
            'stade_du_processus_reg_occupation' => 'nullable|array',
            'demande_non_encore_adressee' => 'nullable|string',
            'demande_adressee_mais_sans_reponse' => 'nullable|string',
            'demande_examinee_par_commission_moughataa_de' => 'nullable|string',
            'aspects_eco_sociaux' => 'nullable|array',
            'organe_de_gestion' => 'nullable|string',
            'djamaa' => 'nullable|string',
            'chef_village' => 'nullable|string',
            'par_rachat' => 'nullable|string',
            'par_voie_heritage' => 'nullable|string',
            'nombre_femmes_exploitantes' => 'nullable|integer',
            'payent_elles_nature' => 'nullable|string',
            'payent_elles_espece' => 'nullable|string',
            'payent_elles_un_loyer' => 'nullable|string',
            'payent_elles_un_rempechen' => 'nullable|string',
            'payent_elles_assakal' => 'nullable|string',
            'speculations_pratiquees',
            'rendement_par_spec_a_hectare' => 'nullable|string|max:255',
            'variete_de_semences' => 'nullable|string|max:255',
            'cycle_speculations' => 'nullable|string|max:255',
            'benefi_credit_etat_institutions_specialisees' => 'nullable|string',
            'contracte_credit_banque_privee' => 'nullable|string',
            'demande_credit_banque_privee' => 'nullable|string',
            'pourquoi' => 'nullable|string|max:255',
            'difficultes_rencontrees' => 'nullable|array',
            'problemes_stockage' => 'nullable|string',
            'problemes_formation' => 'nullable|string',
            'problemes_commercialisation' => 'nullable|string',
            'problemes_financier' => 'nullable|string',
            'problemes_approvisionnement_en_eau' => 'nullable|string',
            'problemes_encadrement_technique' => 'nullable|string',
            'probleme_de_machine' => 'nullable|string',
            'probleme_de_cloture' => 'nullable|string',
            'probleme_de_canalisation' => 'nullable|string',
            'autres_problemes' => 'nullable|string|max:255'
        ]);
        IdentificationIrrigue::create($request->all());
        return redirect()->route('identification_irrigues.index')->with('success', 'Identification Irriguée ajoutée avec succès');
    }


                    public function edit($id)
                {
                    // Récupérer les informations de l'Identification Irriguée à éditer
                    $irrigue = IdentificationIrrigue::find($id);

                    if (!$irrigue) {
                        return redirect()->route('identification_irrigues.index')->with('error', 'Identification Irriguée non trouvée.');
                    }

                    $wilayas = Wilaya::all();

                    return view('backend.identification_irrigues.edit-identification-irrigues', compact('irrigue', 'wilayas'));
                }

                public function update(Request $request, $id)
                {
                    // Validation des données
                    $request->validate([
                        'wilaya_id' => 'required|exists:wilayas,id',
                        'moughataa_id' => 'required|exists:moughataas,id',
                        'commune_id' => 'required|exists:communes,id',
                        'localite_id' => 'required|exists:localites,id',
                        'perimetre_id' => 'required|exists:perimetres,id',
                        'date_amenagement' => 'required|date',
                        'superficie_mise_en_valeur' => 'required|string|max:255',
                        'nombre_adherents' => 'required|numeric',
                        'nombre_homme'=> 'required|numeric',
                        'nombre_femme'=> 'required|numeric',
                        'recepisse_reconnaissance' => 'required|string|max:255',
                        'nom_du_dirigeant_strc_exploitant' => 'required|string',
                        'telephone' => 'required|numeric',
                        'date_regul_stru_exploitant'=> 'required|date',
                        'date_denquete'=> 'required|date',
                        'date_de_mise_en_valeur' => 'required|date',
                        'vocation_du_perimetre' => 'nullable|array',
                        'nature_de_l_organisation' => 'required|string',
                        'propriete_terrain' => 'required|in:collective,individuelle',
                        'mode_acquisition' => 'nullable|array',
                        'loue_a_qui' => 'nullable|string',
                        'loue_quel_prix' => 'nullable|string',
                        'loue_pour_combien_de_temps' => 'nullable|string',
                        'loue_par_contrat' => 'nullable|string',
                        'prete_par_qui' => 'nullable|string',
                        'prete_conditions' => 'nullable|string',
                        'prete_pour_combien_de_temps' => 'nullable|string',
                        'prete_par_contrat' => 'nullable|string',
                        'peut_vendre_a_etrangers' => 'nullable|string',
                        'peut_vendre_a_membres' => 'nullable|string',
                        'peut_preter_a_etrangers' => 'nullable|string',
                        'peut_louer_a_membres' => 'nullable|string',
                        'nombre_etrangers_cultivant' => 'nullable|integer',
                        'etrangers_acquis_droit_par_achat' => 'nullable|string',
                        'etrangers_acquis_droit_par_location' => 'nullable|string',
                        'etrangers_acquis_droit_par_pret' => 'nullable|string',
                        'etrangers_acquis_droit_par_heritage' => 'nullable|string',
                        'droit_exploitation_perimetre' => 'nullable|array',
                        'droit_coutumier_informel_de_la_collectivite' => 'nullable|string',
                        'membre_de_la_collectivite' => 'nullable|string' ,
                        'droit_resultant_concession_provisoire' => 'nullable|string',
                        'domaine_prive_de_etat' => 'nullable|string',
                        'droit_resultant_certificat_propriete_par_hakem_de' => 'nullable|string',
                        'par_le_wali_de' => 'nullable|string',
                        'num_titre_foncier' => 'nullable|string|max:255',
                        'date_du' => 'nullable|date',
                        'delivre_par' => 'nullable|string',
                        'occupation_irreguliere_du_domaine_de_etat' => 'nullable|string',
                        'domaine_des_particuliers_etat' => 'nullable|string',
                        'stade_du_processus_reg_occupation' => 'nullable|array',
                        'demande_non_encore_adressee' => 'nullable|string',
                        'demande_adressee_mais_sans_reponse' => 'nullable|string',
                        'demande_examinee_par_commission_moughataa_de' => 'nullable|string',
                        'aspects_eco_sociaux' => 'nullable|array',
                        'organe_de_gestion' => 'nullable|string',
                        'djamaa' => 'nullable|string',
                        'chef_village' => 'nullable|string',
                        'par_rachat' => 'nullable|string',
                        'par_voie_heritage' => 'nullable|string',
                        'nombre_femmes_exploitantes' => 'nullable|integer',
                        'payent_elles_nature' => 'nullable|string',
                        'payent_elles_espece' => 'nullable|string',
                        'payent_elles_un_loyer' => 'nullable|string',
                        'payent_elles_un_rempechen' => 'nullable|string',
                        'payent_elles_assakal' => 'nullable|string',
                        'speculations_pratiquees',
                        'rendement_par_spec_a_hectare' => 'nullable|string|max:255',
                        'variete_de_semences' => 'nullable|string|max:255',
                        'cycle_speculations' => 'nullable|string|max:255',
                        'benefi_credit_etat_institutions_specialisees' => 'nullable|string',
                        'contracte_credit_banque_privee' => 'nullable|string',
                        'demande_credit_banque_privee' => 'nullable|string',
                        'pourquoi' => 'nullable|string|max:255',
                        'difficultes_rencontrees' => 'nullable|array',
                        'problemes_stockage' => 'nullable|string',
                        'problemes_formation' => 'nullable|string',
                        'problemes_commercialisation' => 'nullable|string',
                        'problemes_financier' => 'nullable|string',
                        'problemes_approvisionnement_en_eau' => 'nullable|string',
                        'problemes_encadrement_technique' => 'nullable|string',
                        'probleme_de_machine' => 'nullable|string',
                        'probleme_de_cloture' => 'nullable|string',
                        'probleme_de_canalisation' => 'nullable|string',
                        'autres_problemes' => 'nullable|string|max:255'
                    ]);

                    // Récupérer l'Identification Irriguée
                    $irrigue = IdentificationIrrigue::find($id);

                    if (!$irrigue) {
                        return redirect()->route('identification_irrigues.index')->with('error', 'Identification Irriguée non trouvée.');
                    }

                    // Mise à jour des données
                    $irrigue->update($request->all());

                    return redirect()->route('identification_irrigues.index')->with('success', 'Identification Irriguée mise à jour avec succès.');
                }



                public function destroy($id)
                {
                    $identificationIrrigue = IdentificationIrrigue::findOrFail($id);
                    $identificationIrrigue->delete();

                    return redirect()->route('identification_irrigues.index')->with('success', 'L\'identification irriguée a été supprimée avec succès.');
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

       return Excel::download(new IdentificationIrrigueExport, 'Enquetes Irrigues.xlsx');
    }


    public function exportPdf() {
        $identifications = IdentificationIrrigue::all();

        // Vérifiez si la vue existe avant de charger le PDF
        if (!view()->exists('backend.identification_irrigues.pdf')) {
            return response()->json(['error' => 'La vue PDF n\'existe pas.'], 404);
        }

        $pdf = PDF::loadView('backend.identification_irrigues.pdf', compact('identifications'));
        return $pdf->download('identifications.pdf');
    }

    public function print_irrigue($id){
        // Récupération de l'irrigue par son ID
        $irrigues = IdentificationIrrigue::where('id', $id)->first();

        // Vérifiez si l'irrigue a été trouvé
        if (!$irrigues) {
            return response()->json(['error' => 'Identification Irriguée non trouvée.'], 404);
        }

        // Passez la variable correcte à la vue
        return view('backend.identification_irrigues.print-irrigue', compact('irrigues'));
    }









}
