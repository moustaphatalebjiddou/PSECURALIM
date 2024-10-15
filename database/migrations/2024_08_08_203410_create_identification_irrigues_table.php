<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
    Schema::create('identification_irrigues', function (Blueprint $table) {
        $table->id();
        $table->foreignId('wilaya_id')->constrained()->onDelete('cascade');
        $table->foreignId('moughataa_id')->constrained()->onDelete('cascade');
        $table->foreignId('commune_id')->constrained()->onDelete('cascade');
        $table->foreignId('localite_id')->constrained()->onDelete('cascade');
        $table->foreignId('perimetre_id')->constrained()->onDelete('cascade');
        $table->date('date_amenagement');
        $table->decimal('superficie_mise_en_valeur', 8, 2);
        $table->date('date_de_mise_en_valeur');
        $table->json('vocation_du_perimetre');
        $table->string('nature_de_l_organisation');
        $table->integer("nombre_adherents");
        $table->integer('nombre_homme');
        $table->integer('nombre_femme');
        $table->date('date_regul_stru_exploitant');
        $table->string('recepisse_reconnaissance');
        $table->string('nom_du_dirigeant_strc_exploitant');
        $table->string('telephone');

        // Ajout des nouveaux champs
        $table->enum('propriete_terrain', ['collective', 'individuelle']);
        $table->json('mode_acquisition')->nullable();
        $table->string('loue_a_qui')->nullable();
        $table->string('loue_quel_prix')->nullable();
        $table->string('loue_pour_combien_de_temps')->nullable();
        $table->string('loue_par_contrat')->nullable();
        $table->string('prete_par_qui')->nullable();
        $table->text('prete_conditions')->nullable();
        $table->string('prete_pour_combien_de_temps')->nullable();
        $table->string('prete_par_contrat')->nullable();
        $table->string('peut_vendre_a_etrangers')->nullable();
        $table->string('peut_vendre_a_membres')->nullable();
        $table->string('peut_preter_a_etrangers')->nullable();
        $table->string('peut_louer_a_membres')->nullable();
        $table->integer('nombre_etrangers_cultivant')->nullable();
        $table->string('etrangers_acquis_droit_par_achat')->nullable();
        $table->string('etrangers_acquis_droit_par_location')->nullable();
        $table->string('etrangers_acquis_droit_par_pret')->nullable();
        $table->string('etrangers_acquis_droit_par_heritage')->nullable();
        // Les nouveaux champs
        $table->json('droit_exploitation_perimetre')->nullable();
        $table->string('droit_coutumier_informel_de_la_collectivite')->nullable();
        $table->string('membre_de_la_collectivite')->nullable();
        $table->string('droit_concession_provisoire')->nullable();
        $table->string('domaine_privee_de_etat')->nullable();
        $table->string('droit_resultant_certificat_propriete_par_hakem_de')->nullable();
        $table->string('par_le_wali_de')->nullable();
        $table->string('num_titre_foncier')->nullable();
        $table->date('date_du')->nullable();
        $table->string('delivre_par')->nullable();
        $table->string('occupation_irreguliere_du_domaine_de_etat')->nullable();
        $table->string('domaine_des_particuliers_etat')->nullable();
        // Les nouveaux champs
        $table->json('stade_du_processus_reg_occupation')->nullable();
        $table->string('demande_non_encore_adressee')->nullable();
        $table->string('demande_adressee_mais_sans_reponse')->nullable();
        $table->string('demande_examinee_par_commission_moughataa_de')->nullable();
        $table->string('debut_de_processus')->nullable();
        // Les nouveaux champs
        $table->json('aspects_eco_sociaux')->nullable();
        $table->string('organe_de_gestion')->nullable();
        $table->string('djamaa')->nullable();
        $table->string('chef_village')->nullable();
        $table->string('par_rachat')->nullable();
        $table->string('par_voie_heritage')->nullable();
        $table->integer('nombre_femmes_exploitantes')->nullable();
        $table->string('payent_elles_nature')->nullable();
        $table->string('payent_elles_espece')->nullable();
        $table->string('payent_elles_un_loyer')->nullable();
        $table->string('payent_elles_un_rempechen')->nullable();
        $table->string('payent_elles_assakal')->nullable();
        $table->string('speculations_pratiquees')->nullable();
        $table->string('rendement_par_spec_a_hectare')->nullable();
        $table->string('variete_de_semences')->nullable();
        $table->string('cycle_speculations')->nullable();
        $table->string('benefi_credit_etat_institutions_specialisees')->nullable();
        $table->string('contracte_credit_banque_privee')->nullable();
        $table->string('demande_credit_banque_privee')->nullable();
        $table->string('pourquoi')->nullable();
        // Les nouveaux champs
        $table->json('difficultes_rencontrees')->nullable();
        $table->string('problemes_stockage')->nullable();
        $table->string('problemes_formation')->nullable();
        $table->string('problemes_commercialisation')->nullable();
        $table->string('problemes_financier')->nullable();
        $table->string('problemes_approvisionnement_en_eau')->nullable();
        $table->string('problemes_encadrement_technique')->nullable();
        $table->string('probleme_de_machine')->nullable();
        $table->string('probleme_de_cloture')->nullable();
        $table->string('probleme_de_canalisation')->nullable();
        $table->string('autres_problemes')->nullable();













        $table->timestamps();
    });
}

        public function down()
        {
            Schema::dropIfExists('identification_irrigues');
        }
};
