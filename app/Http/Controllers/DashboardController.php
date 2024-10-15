<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentificationIrrigue;
use App\Models\Wilaya;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les statistiques générales
        $stats = DB::table('identification_irrigues')
            ->select(
                DB::raw('SUM(nombre_homme) as total_hommes'),
                DB::raw('SUM(nombre_femme) as total_femmes'),
                DB::raw('SUM(nombre_etrangers_cultivant) as total_etrangers'),
                DB::raw('SUM(superficie_mise_en_valeur) as total_superficie'), // Total superficie mise en valeur
                DB::raw('SUM(nombre_adherents) as total_adherents'), // Total adhérents
                DB::raw('SUM(nombre_femmes_exploitantes) as total_femmes_exploitantes')// Total femmes exploitantes
            )
            ->first();

        // Récupérer les données des wilayas
        $donneesWilayas = DB::table('wilayas')
            ->select('wilayas.nom_du_wilaya as wilaya_nom', DB::raw('COUNT(DISTINCT localites.id) as total_localites'))
            ->join('moughataas', 'wilayas.id', '=', 'moughataas.wilaya_id')
            ->join('communes', 'moughataas.id', '=', 'communes.moughataa_id')
            ->join('localites', 'communes.id', '=', 'localites.commune_id')
            ->groupBy('wilayas.nom_du_wilaya')
            ->get();

        // Préparer les données pour le graphique (on compte les localités par wilaya)
        $wilayaLabels = $donneesWilayas->pluck('wilaya_nom')->toArray(); // Noms des wilayas
        $localiteCounts = $donneesWilayas->pluck('total_localites')->toArray(); // Nombre de localités par wilaya

            // Récupérer les difficultés rencontrées sous forme de tableau JSON
            $difficultes = DB::table('identification_irrigues')
            ->pluck('difficultes_rencontrees')
            ->toArray();

            // Stocker toutes les difficultés dans un tableau à plat
            $difficultesFlat = [];

            foreach ($difficultes as $difficulte) {
            // Décoder chaque entrée JSON
            $difficulteData = json_decode($difficulte, true);

            if (is_array($difficulteData)) {
                foreach ($difficulteData as $value) {
                    $difficultesFlat[] = ucfirst($value); // Ajouter les difficultés et capitaliser
                }
            }
            }

            // Enlever les doublons
            $difficultesFlat = array_unique($difficultesFlat);

            // Si aucune difficulté n'est trouvée, retourner un message par défaut
            if (empty($difficultesFlat)) {
            $difficultesFlat[] = "Aucune difficulté rencontrée pour le moment";
            }
          // Récupérer les données de la table identification_irrigues
    $vocations = IdentificationIrrigue::select('vocation_du_perimetre', 'wilaya_id', 'moughataa_id', 'commune_id', 'localite_id')->get();

    // Formater les données pour le graphique
    $data = [];
    $labels = []; // Pour stocker les noms des valeurs
    foreach ($vocations as $vocation) {
        $vocationsList = is_array($vocation->vocation_du_perimetre) ? $vocation->vocation_du_perimetre : json_decode($vocation->vocation_du_perimetre, true);

        foreach ($vocationsList as $vocationValue) {
            // Ajouter les noms des valeurs
            $data[$vocation->wilaya_id][$vocation->moughataa_id][$vocation->commune_id][$vocation->localite_id][] = $vocationValue;
            $labels[$vocationValue] = $vocationValue; // Ajouter à la liste des labels
        }
        }
            // Récupérer toutes les wilayas pour le dropdown
            $wilayas = Wilaya::all();

        // Récupérer les données pour les graphiques
         $terrainsLoue = IdentificationIrrigue::whereJsonContains('mode_acquisition', 'loué')->count();
         $terrainsPrete = IdentificationIrrigue::whereJsonContains('mode_acquisition', 'prêté')->count();

         // Comptages des autorisations
         $peutVendreAEtrangers = IdentificationIrrigue::where('peut_vendre_a_etrangers', 'oui')->count();
         $peutVendreAMembres = IdentificationIrrigue::where('peut_vendre_a_membres', 'oui')->count();
         $peutPreterAEtrangers = IdentificationIrrigue::where('peut_preter_a_etrangers', 'oui')->count();
         $peutLouerAMembres = IdentificationIrrigue::where('peut_louer_a_membres', 'oui')->count();

          // Récupérer les données pour la responsabilité de la distribution des parcelles
        $distributionParcelles = [
            'Organe de gestion' => IdentificationIrrigue::where('organe_de_gestion', 1)->count(),
            'Djamaa' => IdentificationIrrigue::where('djamaa', 1)->count(),
            'Chef du village' => IdentificationIrrigue::where('chef_village', 1)->count(),
        ];
        // Récupérer et compter les occurrences de chaque nature d'organisation
        $naturesOrganisations = IdentificationIrrigue::select('nature_de_l_organisation')
            ->groupBy('nature_de_l_organisation')
            ->selectRaw('nature_de_l_organisation, COUNT(*) as count')
            ->get();

             // Comptez le nombre de terrains pour chaque mode d'acquisition
        $modesAcquisition = IdentificationIrrigue::select('mode_acquisition')
        ->get()
        ->pluck('mode_acquisition')
        ->flatten()
        ->countBy()
        ->toArray();

         // Compter le nombre total d'enregistrements dans la table identification_irrigues
    $totalEnquetes = IdentificationIrrigue::count();
      // Retourner la vue avec les données
        return view('backend.layouts.dashboard', compact('stats', 'wilayaLabels', 'localiteCounts','difficultesFlat', 'data', 'wilayas','labels',
             'terrainsLoue',
             'terrainsPrete',
             'peutVendreAEtrangers',
             'peutVendreAMembres',
             'peutPreterAEtrangers',
             'peutLouerAMembres',
             'distributionParcelles',
             'naturesOrganisations',
             'modesAcquisition',
             'totalEnquetes'
            ));

            }


}

