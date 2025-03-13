<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'wilaya_id',
        'moughataa_id',
        'commune_id',
        'localite_id',
        'perimetre_id',
        'date_amenagement',
        'superficie_mise_en_valeur',
        'date_de_mise_en_valeur',
        'vocation_du_perimetre',
        'nature_de_l_organisation',
        'nombre_adherents',
        'nombre_homme',
        'nombre_femme',
        'date_regul_stru_exploitant',
        'recepisse_reconnaissance',
        'nom_du_dirigeant_strc_exploitant',
        'telephone',
        'propriete_terrain',
        'mode_acquisition',
        'loue_a_qui',
        'loue_quel_prix',
        'loue_pour_combien_de_temps',
        'loue_par_contrat',
        'prete_par_qui',
        'prete_conditions',
        'prete_pour_combien_de_temps',
        'prete_par_contrat',
        'peut_vendre_a_etrangers',
        'peut_vendre_a_membres',
        'peut_preter_a_etrangers',
        'peut_louer_a_membres',
        'nombre_etrangers_cultivant',
        'etrangers_acquis_droit_par_achat',
        'etrangers_acquis_droit_par_location',
        'etrangers_acquis_droit_par_pret',
        'etrangers_acquis_droit_par_heritage',
        'droit_exploitation_perimetre',
        'droit_coutumier_informel_de_la_collectivite',
        'membre_de_la_collectivite',
        'droit_resultant_concession_provisoire',
        'domaine_privee_de_etat',
        'droit_resultant_certificat_propriete_par_hakem_de',
        'par_le_wali_de',
        'num_titre_foncier',
        'date_du',
        'delivre_par',
        'occupation_irreguliere_du_domaine_de_etat',
        'domaine_des_particuliers_etat',
        'stade_du_processus_reg_occupation',
        'demande_non_encore_adressee',
        'demande_adressee_mais_sans_reponse',
        'demande_examinee_par_commission_moughataa_de',
        'debut_de_processus',
        'aspects_eco_sociaux',
        'organe_de_gestion',
        'djamaa',
        'chef_village',
        'par_rachat',
        'par_voie_heritage',
        'nombre_femmes_exploitantes',
        'payent_elles_nature',
        'payent_elles_espece',
        'payent_elles_un_loyer',
        'payent_elles_un_rempechen',
        'payent_elles_assakal',
        'speculations_pratiquees',
        'rendement_par_spec_a_hectare',
        'variete_de_semences',
        'cycle_speculations',
        'benefi_credit_etat_institutions_specialisees',
        'contracte_credit_banque_privee',
        'demande_credit_banque_privee',
        'pourquoi',
        'difficultes_rencontrees',
        'problemes_stockage',
        'problemes_formation',
        'problemes_commercialisation',
        'problemes_financier',
        'problemes_approvisionnement_en_eau',
        'problemes_encadrement_technique',
        'probleme_de_machine',
        'probleme_de_cloture',
        'probleme_de_canalisation',
        'autres_problemes'

    ];

    protected $casts = [
        'vocation_du_perimetre' => 'array',
        'mode_acquisition' => 'array',
        'droit_exploitation_perimetre' => 'array',
        'stade_du_processus_reg_occupation' => 'array',
        'aspects_eco_sociaux' => 'array',
        'difficultes_rencontrees' => 'array'
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
