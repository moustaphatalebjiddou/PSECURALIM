<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperativerizicole extends Model
{
    use HasFactory;

    protected $table = 'cooperativesrizicoles';

    // Indiquer que les colonnes sont mass-assignable
    protected $fillable = [
        'wilaya_id', 'moughataa_id', 'commune_id', 'localite_id', 'perimetre_id',
        'nom_cooperative', 'coordonnees_gps', 'type_perimetre', 'status_de_lorganisation',
        'nombre_adherents', 'nombre_femme', 'nom_du_president', 'contact_du_president',
        'deuxieme_contact', 'type_de_document', 'annee_creation_de_lexploitation',
        'superficie_totale', 'superficie_emblavee_hivernale', 'superficie_emblavee_contre_sais',
        'nombre_annee_experience', 'speculation_principale', 'en_campagne_contre_sais_actuelle',
        'partant_pour_camp_hiver_prochaine', 'type_semences_utilises', 'variete_de_semences_utilises',
        'mode_approvisionnement_en_semence', 'lieu_approvisionnement', 'lieu_stockage_des_semences',
        'qtite_semence_pour_emblaver', 'rendement_moyen_en_hivernage', 'rendement_moyen_contre_sais',
        'qtite_recoltee_en_camp_hiv_022', 'qtite_recoltee_en_camp_contre_sais_023', 'source_de_financement',
        'caisse_ou_fond_deroulement', 'source_financement_de_la_caisse', 'existence_fonds_pour_entr_renou_infra',
        'bureau_executif', 'comment_est_il_structurer', 'reglement_interieur', 'etat_damenagement_du_perimetre',
        'evaluation_de_la_fonctionnalite', 'source_dirrigation', 'type_de_distribution', 'type_de_pompage',
        'nombre_de_gmp', 'nombre_de_gmp_fonctionnel', 'nombre_station_de_pompage', 'nombre_station_pompage_fonctionnel',
        'type_main_doeuvre_utilise', 'organisation_appuyant_les_cooperative', 'type_genre_daccompagnement_apporte',
        'besoin_sujet_prioritaires', 'satisfait_de_lorganisation', 'motif_dinsatisfaction_de_lorganisation',
        'accord_sur_contrib__a_haut_de_20_percent', 'recommandation_pour_ameliorer_lexploitation',
        'observsation_generale'
    ];

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }

    public function moughataa()
    {
        return $this->belongsTo(Moughataa::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function localite()
    {
        return $this->belongsTo(Localite::class);
    }

    public function perimetre()
    {
        return $this->belongsTo(Perimetre::class);
    }
}


