<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cooperativesrizicoles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wilaya_id')->constrained()->onDelete('cascade');
            $table->foreignId('moughataa_id')->constrained()->onDelete('cascade');
            $table->foreignId('commune_id')->constrained()->onDelete('cascade');
            $table->foreignId('localite_id')->constrained()->onDelete('cascade');
            $table->foreignId('perimetre_id')->constrained()->onDelete('cascade');
            $table->string('nom_cooperative');
            $table->string('coordonnees_gps');
            $table->string('type_perimetre');
            $table->string('status_de_lorganisation');
            $table->integer("nombre_adherents");
            $table->integer('nombre_femme');
            $table->string('nom_du_president');
            $table->string('contact_du_president');
            $table->string('deuxieme_contact');
            $table->string('type_de_document');
            $table->string('annee_creation_de_lexploitation');
            $table->string('superficie_totale');
            $table->string('superficie_emblavee_hivernale');
            $table->string('superficie_emblavee_contre_sais');
            $table->integer('nombre_annee_experience');
            $table->string('speculation_principale');
            $table->string('en_campagne_contre_sais_actuelle');
            $table->string('partant_pour_camp_hiver_prochaine');
            $table->string('type_semences_utilises');
            $table->string('variete_de_semences_utilises');
            $table->string('mode_approvisionnement_en_semence');
            $table->string('lieu_approvisionnement');
            $table->string('lieu_stockage_des_semences');
            $table->string('qtite_semence_pour_emblaver');
            $table->string('rendement_moyen_en_hivernage');
            $table->string('rendement_moyen_contre_sais');
            $table->string('qtite_recoltee_en_camp_hiv_022');
            $table->string('qtite_recoltee_en_camp_contre_sais_023');
            $table->string('source_de_financement');
            $table->string('caisse_ou_fond_deroulement');
            $table->string('source_financement_de_la_caisse');
            $table->string('existence_fonds_pour_entr_renou_infra');
            $table->string('bureau_executif');
            $table->string('comment_est_il_structurer');
            $table->string('reglement_interieur');
            $table->string('etat_damenagement_du_perimetre');
            $table->string('evaluation_de_la_fonctionnalite');
            $table->string('source_dirrigation');
            $table->string('type_de_distribution');
            $table->string('type_de_pompage');
            $table->integer('nombre_de_gmp');
            $table->integer ('nombre_de_gmp_fonctionnel');
            $table->integer ('nombre_station_de_pompage');
            $table->integer ('nombre_station_pompage_fonctionnel');
            $table->string('type_main_doeuvre_utilise');
            $table->string('organisation_appuyant_les_cooperative');
            $table->string('type_genre_daccompagnement_apporte');
            $table->string('besoin_sujet_prioritaires');
            $table->string('satisfait_de_lorganisation');
            $table->string('motif_dinsatisfaction_de_lorganisation');
            $table->string('accord_sur_contrib__a_haut_de_20_percent');
            $table->string('recommandation_pour_ameliorer_lexploitation');
            $table->string('observsation_generale');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooperativesrizicoles');
    }
};
