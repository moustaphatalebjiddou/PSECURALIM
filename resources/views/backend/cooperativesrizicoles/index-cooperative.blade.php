@extends('backend.layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                       <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Liste des champs irrigues en complement</h3>
                                    <div class="btn-group">
                                        <a href="{{ url('export_cooperativerizicole') }}" class="btn btn-success">Exporter Excel</a>
                                        <a href="{{ route('cooperativerizicole.export.pdf') }}" class="btn btn-danger">Exporter PDF</a>

                                    </div>
                                    <form action="{{ route('cooperativerizicole.create') }}"></form>
                                </div>
                                <div class="mt-3">
                                    <form method="GET" action="{{ route('cooperativerizicole.index') }}" class="mb-3">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, date, etc." value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                    <!-- Button to open the modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#multiStepModal">
                        Ajouter une Coopérative Rizicole
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="multiStepModal" tabindex="-1" role="dialog" aria-labelledby="multiStepModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="multiStepModalLabel">Ajouter une Coopérative Rizicole</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="multiStepForm" action="{{ route('cooperativerizicole.store') }}" method="POST">
                                        @csrf
                                        <div class="progress mb-4">
                                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>


                                        <!-- Étape 1 : Identification -->
                                        <div class="step" id="step1">
                                            <h4>Étape 1 : Identification</h4>
                                            <label for="wilaya">Wilaya:</label>
                                            <select name="wilaya_id" id="wilaya" required>
                                                <option value="">Sélectionner une Wilaya</option>
                                                @foreach($wilayas as $wilaya)
                                                    <option value="{{ $wilaya->id }}">{{ $wilaya->nom_du_wilaya }}</option>
                                                @endforeach
                                            </select>

                                            <label for="moughataa">Moughataa:</label>
                                            <select name="moughataa_id" id="moughataa" required disabled></select>

                                            <label for="commune">Commune:</label>
                                            <select name="commune_id" id="commune" required disabled></select>

                                            <label for="localite">Localité:</label>
                                            <select name="localite_id" id="localite" required disabled></select>

                                            <label for="perimetre">Périmètre:</label>
                                            <select name="perimetre_id" id="perimetre" required disabled></select>

                                            <div class="col-md-6 mb-3">
                                                <label for="nom_cooperative">Nom de la Coopérative</label>
                                                <input type="text" class="form-control @error('nom_cooperative') is-invalid @enderror" name="nom_cooperative" id="nom_cooperative" value="{{ old('nom_cooperative') }}" required>
                                                @error('nom_cooperative')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Étape 2 : Aspects Foncier -->
                                     <!--
                                        <div class="step" id="step2" style="display: none;">
                                            <h4>Étape 2 : Aspects Foncier</h4>
                                             <div class="col-md-6 mb-3">
                                            <label for="coordonnees_gps">Coordonnées GPS:</label>
                                            <input type="text" class="form-control" name="coordonnees_gps" value="{{ old('coordonnees_gps') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="type_perimetre">Type de Périmètre:</label>
                                            <input type="text" class="form-control" name="type_perimetre" value="{{ old('type_perimetre') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="status_de_lorganisation">Statut de l'organisation:</label>
                                            <input type="text" class="form-control" name="status_de_lorganisation" value="{{ old('status_de_lorganisation') }}">
                                            </div>
                                        </div>
                                        -->
                                        <div class="step" id="step2" style="display: none;">
                                        <h4>Étape 2 : Aspects Foncier</h4>

                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="coordonnees_gps">Coordonnées GPS:</label>
                                                <input type="text" class="form-control" name="coordonnees_gps" value="{{ old('coordonnees_gps') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="type_perimetre">Type de Périmètre:</label>
                                                <input type="text" class="form-control" name="type_perimetre" value="{{ old('type_perimetre') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="status_de_lorganisation">Statut de l'organisation:</label>
                                                <input type="text" class="form-control" name="status_de_lorganisation" value="{{ old('status_de_lorganisation') }}">
                                            </div>
                                        </div>
                                    </div>

                                        <!-- Étape 3 : Aspects Économiques et Sociaux -->
                                   
                                        <div class="step" id="step3" style="display: none;">                                    
                                            <h4>Étape 3 : Aspects Économiques et Sociaux</h4>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                            <label for="nombre_adherents">Nombre d'adhérents:</label>
                                            <input type="number" class="form-control" name="nombre_adherents" value="{{ old('nombre_adherents') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="nombre_femme">Nombre de femmes:</label>
                                            <input type="number" class="form-control" name="nombre_femme" value="{{ old('nombre_femme') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="nom_du_president">Nom du président:</label>
                                            <input type="text" class="form-control" name="nom_du_president" value="{{ old('nom_du_president') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="contact_du_president">Contact du président:</label>
                                            <input type="text" class="form-control" name="contact_du_president" value="{{ old('contact_du_president') }}">
                                            </div>
                                            
                                            <h4>Informations Générales</h4>
                                            <div class="col-md-4">
                                            <label for="deuxieme_contact">Deuxième contact :</label>
                                            <input type="text" class="form-control" name="deuxieme_contact" value="{{ old('deuxieme_contact') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="type_de_document">Type de document :</label>
                                            <input type="text" class="form-control" name="type_de_document" value="{{ old('type_de_document') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="annee_creation_de_lexploitation">Année de création de l'exploitation</label>
                                            <input type="number" class="form-control" name="annee_creation_de_lexploitation" value="{{ old('annee_creation_de_lexploitation') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="superficie_totale">Superficie totale (ha) :</label>
                                            <input type="number" step="0.01" class="form-control" name="superficie_totale" value="{{ old('superficie_totale') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="superficie_emblavee_hivernale">Superficie emblavée hivernale (ha):</label>
                                            <input type="number" step="0.01" class="form-control" name="superficie_emblavee_hivernale" value="{{ old('superficie_emblavee_hivernale') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="superficie_emblavee_contre_sais">Superficie emblavée contre-saison (ha) :</label>
                                            <input type="number" step="0.01" class="form-control" name="superficie_emblavee_contre_sais" value="{{ old('superficie_emblavee_contre_sais') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="nombre_annee_experience">Nombre d'années d'expérience :</label>
                                            <input type="number" class="form-control" name="nombre_annee_experience" value="{{ old('nombre_annee_experience') }}">
                                            </div>
                                            <div class="col-md-4">
                                            <label for="speculation_principale">Spéculation principale :</label>
                                            <input type="text" class="form-control" name="speculation_principale" value="{{ old('speculation_principale') }}">
                                            </div>
                                            <h4>Campagnes et Rendements</h4>
                                            <div class="col-md-4">
                                            <label for="en_campagne_contre_sais_actuelle">En campagne contre-saison actuelle :</label>
                                            <div>
                                                <label>
                                                        <input type="radio" name="en_campagne_contre_sais_actuelle" value="1"
                                                            {{ old('en_campagne_contre_sais_actuelle') == '1' ? 'checked' : '' }}>
                                                        Oui
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>
                                                        <input type="radio" name="en_campagne_contre_sais_actuelle" value="0"
                                                            {{ old('en_campagne_contre_sais_actuelle') == '0' ? 'checked' : '' }}>
                                                        Non
                                                    </label>
                                                </div>
                                                </div>
                                                
                                                <label for="partant_pour_camp_hiver_prochaine">Partant pour campagne hivernale prochaine :</label>
                                                <div>
                                                 <div class="col-md-4">
                                                    <label>
                                                        <input type="radio" name="partant_pour_camp_hiver_prochaine" value="1"
                                                            {{ old('partant_pour_camp_hiver_prochaine') == '1' ? 'checked' : '' }}>
                                                        Oui
                                                    </label>
                                                    </div>
                                                     <div class="col-md-4">
                                                    <label>
                                                        <input type="radio" name="partant_pour_camp_hiver_prochaine" value="0"
                                                            {{ old('partant_pour_camp_hiver_prochaine') == '0' ? 'checked' : '' }}>
                                                        Non
                                                    </label>
                                                    </div>
                                                </div>

                                                 <div class="col-md-4">
                                                <label for="rendement_moyen_en_hivernage">Rendement moyen en hivernage (kg/ha) :</label>
                                                <input type="number" step="0.01" class="form-control" name="rendement_moyen_en_hivernage" value="{{ old('rendement_moyen_en_hivernage') }}">
                                                </div>
                                                 <div class="col-md-4">
                                                <label for="rendement_moyen_contre_sais">Rendement moyen contre-saison (kg/ha) :</label>
                                                <input type="number" step="0.01" class="form-control" name="rendement_moyen_contre_sais" value="{{ old('rendement_moyen_contre_sais') }}">
                                                </div>

                                                <h4>Semences</h4>
                                                <div class="col-md-4">
                                                <label for="type_semences_utilises">Type de semences utilisées :</label>
                                                <input type="text" class="form-control" name="type_semences_utilises" value="{{ old('type_semences_utilises') }}">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="variete_de_semences_utilises">Variété de semences utilisées :</label>
                                                <input type="text" class="form-control" name="variete_de_semences_utilises" value="{{ old('variete_de_semences_utilises') }}">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="mode_approvisionnement_en_semence">Mode d'approvisionnement en semences :</label>
                                                <input type="text" class="form-control" name="mode_approvisionnement_en_semence" value="{{ old('mode_approvisionnement_en_semence') }}">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="lieu_approvisionnement">Lieu d'approvisionnement :</label>
                                                <input type="text" class="form-control" name="lieu_approvisionnement" value="{{ old('lieu_approvisionnement') }}">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="qtite_semence_pour_emblaver">Quantité de semences pour emblaver (kg) :</label>
                                                <input type="number" step="0.01" class="form-control" name="qtite_semence_pour_emblaver" value="{{ old('qtite_semence_pour_emblaver') }}">
                                                </div>
                                                <h4>Financement</h4>
                                                <div class="col-md-4">
                                                <label for="source_de_financement">Source de financement :</label>
                                                <input type="text" class="form-control" name="source_de_financement" value="{{ old('source_de_financement') }}">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="caisse_ou_fond_deroulement">Caisse ou fonds de déroulement :</label>
                                                <input type="text" class="form-control" name="caisse_ou_fond_deroulement" value="{{ old('caisse_ou_fond_deroulement') }}">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="source_financement_de_la_caisse">Source de financement de la caisse :</label>
                                                <input type="text" class="form-control" name="source_financement_de_la_caisse" value="{{ old('source_financement_de_la_caisse') }}">
                                                </div>
                                                <h4>Organisation et Gestion</h4>
                                                <div class="col-md-4">
                                                <label for="bureau_executif">Bureau exécutif :</label>
                                                <input type="text" class="form-control" name="bureau_executif" value="{{ old('bureau_executif') }}">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="lieu_stockage_des_semences">Lieu de stockage des semences :</label>
                                                <input type="text" class="form-control" name="lieu_stockage_des_semences" value="{{ old('lieu_stockage_des_semences') }}">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="comment_est_il_structurer">Comment est-il structuré :</label>
                                                <textarea class="form-control" name="comment_est_il_structurer">{{ old('comment_est_il_structurer') }}</textarea>
                                                 </div>
                                                <h4>Recommandations et Observations</h4>
                                                <div class="col-md-4">
                                                <label for="recommandation_pour_ameliorer_lexploitation">Recommandation pour améliorer l'exploitation :</label>
                                                <textarea class="form-control" name="recommandation_pour_ameliorer_lexploitation">{{ old('recommandation_pour_ameliorer_lexploitation') }}</textarea>
                                                </div>
                                                <!-- Champ : Satisfait de l'organisation -->
                                                <label for="satisfait_de_lorganisation">Satisfait de l'organisation :</label>
                                                <div>
                                                 <div class="col-md-4">
                                                    <label>
                                                        <input type="radio" name="satisfait_de_lorganisation" value="1"
                                                            {{ old('satisfait_de_lorganisation') == '1' ? 'checked' : '' }}>
                                                        Oui
                                                    </label>
                                                  </div>
                                                    <div class="col-md-4">  
                                                    <label>
                                                        <input type="radio" name="satisfait_de_lorganisation" value="0"
                                                            {{ old('satisfait_de_lorganisation') == '0' ? 'checked' : '' }}>
                                                        Non
                                                    </label>
                                                     </div>
                                                </div>
                                        </div>
                                        </div>
                                        </div>
                                        <!-- Étape 4 : Difficultés rencontrées -->
                                        <div class="step" id="step4" style="display: none;">
                                            <h4>Étape 4 : Difficultés rencontrées</h4>

                                            <!-- Champ : Accord sur contribution à hauteur de 20% -->
                                            <label for="accord_sur_contrib__a_haut_de_20_percent">Accord sur contribution à hauteur de 20% :</label>
                                            <div>
                                             <div class="col-md-6 mb-3">
                                                <label>
                                                    <input type="radio" name="accord_sur_contrib__a_haut_de_20_percent" value="1"
                                                        {{ old('accord_sur_contrib__a_haut_de_20_percent') == '1' ? 'checked' : '' }}>
                                                    Oui
                                                </label>
                                            </div>
                                             <div class="col-md-6 mb-3">
                                                <label>
                                                    <input type="radio" name="accord_sur_contrib__a_haut_de_20_percent" value="0"
                                                        {{ old('accord_sur_contrib__a_haut_de_20_percent') == '0' ? 'checked' : '' }}>
                                                    Non
                                                </label>
                                              </div>  
                                            </div>

                                            <label for="existence_fonds_pour_entr_renou_infra">Existence des fonds pour l'eentretien et renouvelement des infrastructures :</label>
                                                <div>
                                                 <div class="col-md-6 mb-3">
                                                    <label>
                                                        <input type="radio" name="existence_fonds_pour_entr_renou_infra" value="1"
                                                            {{ old('existence_fonds_pour_entr_renou_infra') == '1' ? 'checked' : '' }}>
                                                        Oui
                                                    </label>
                                                </div>
                                                 <div class="col-md-6 mb-3">
                                                    <label>
                                                        <input type="radio" name="existence_fonds_pour_entr_renou_infra" value="0"
                                                            {{ old('existence_fonds_pour_entr_renou_infra') == '0' ? 'checked' : '' }}>
                                                        Non
                                                    </label>
                                                 </div>   
                                                </div>
<!--
    <label for="qtite_recoltee_en_camp_hiv_022">Quantité récoltée en campagne hivernale 2022 :</label>
    <input type="number" name="qtite_recoltee_en_camp_hiv_022" id="qtite_recoltee_en_camp_hiv_022">
-->
    <div class="col-md-6 mb-3">
       <label for="qtite_recoltee_en_camp_hiv_022">Quantité récoltée en campagne hivernale 2022 :</label>
       <input type="number" class="form-control" name="qtite_recoltee_en_camp_hiv_022" value="{{ old('qtite_recoltee_en_camp_hiv_022') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="qtite_recoltee_en_camp_contre_sais_023">Quantite recoltee en campagne contre saison023 :</label>
        <input type="number" class="form-control" name="qtite_recoltee_en_camp_contre_sais_023" id="qtite_recoltee_en_camp_contre_sais_023">
    </div>
    <div class="col-md-6 mb-3">
        <label for="nombre_de_gmp">Nombre de GMP  :</label>
        <input type="number" class="form-control" name="nombre_de_gmp" id="nombre_de_gmp">
    </div>
    <div class="col-md-6 mb-3">
        <label for="nombre_de_gmp_fonctionnel">Nombre de GMP fonctionnel :</label>
        <input type="number" class="form-control" name="nombre_de_gmp_fonctionnel" id="nombre_de_gmp_fonctionnel">
    </div>
    <div class="col-md-6 mb-3">
        <label for="nombre_station_de_pompage">Nombre de stations de pompage :</label>
        <input type="number" class="form-control" name="nombre_station_de_pompage" id="nombre_station_de_pompage">
    </div>
    <div class="col-md-6 mb-3">
        <label for="nombre_station_pompage_fonctionnel">Nombre de stations de pompage fonctionnelles :</label>
        <input type="number" class="form-control" name="nombre_station_pompage_fonctionnel" id="nombre_station_pompage_fonctionnel">
    </div>
    <div class="col-md-6 mb-3">
    <label for="type_main_doeuvre_utilise">Type de main-d'œuvre utilisée :</label>
    <input type="text" class="form-control" name="type_main_doeuvre_utilise" id="type_main_doeuvre_utilise" maxlength="255">
    </div>
     <div class="col-md-6 mb-3">
    <label for="organisation_appuyant_les_cooperative">Organisation appuyant les coopératives :</label>
    <input type="text" name="organisation_appuyant_les_cooperative" id="organisation_appuyant_les_cooperative" maxlength="255">
    </div>
     <div class="col-md-6 mb-3">
    <label for="type_genre_daccompagnement_apporte">Type et genre d'accompagnement apporté :</label>
    <input type="text" name="type_genre_daccompagnement_apporte" id="type_genre_daccompagnement_apporte" maxlength="255">
    </div>
     <div class="col-md-6 mb-3">
    <label for="besoin_sujet_prioritaires">Besoins et sujets prioritaires :</label>
    <input type="text" name="besoin_sujet_prioritaires" id="besoin_sujet_prioritaires" maxlength="255">
    </div>
     <div class="col-md-6 mb-3">
    <label for="satisfait_de_lorganisation">Satisfait de l'organisation :</label>
    <select name="satisfait_de_lorganisation" id="satisfait_de_lorganisation" required>
        <option value="1">Oui</option>
        <option value="0">Non</option>
    </select>
    </div>
     <div class="col-md-6 mb-3">
    <label for="motif_dinsatisfaction_de_lorganisation">Motif d'insatisfaction de l'organisation :</label>
    <input type="text" name="motif_dinsatisfaction_de_lorganisation" id="motif_dinsatisfaction_de_lorganisation" maxlength="255">
    </div>
     <div class="col-md-6 mb-3">
    <label for="accord_sur_contrib__a_haut_de_20_percent">Accord sur une contribution à hauteur de 20% :</label>
    <select name="accord_sur_contrib__a_haut_de_20_percent" id="accord_sur_contrib__a_haut_de_20_percent" required>
        <option value="1">Oui</option>
        <option value="0">Non</option>
    </select>
    </div>
     <div class="col-md-6 mb-3">
    <label for="recommandation_pour_ameliorer_lexploitation">Recommandations pour améliorer l'exploitation :</label>
    <input type="text" name="recommandation_pour_ameliorer_lexploitation" id="recommandation_pour_ameliorer_lexploitation" maxlength="255">
    </div>

             <div class="col-md-6 mb-3">
                <label for="reglement_interieur">Règlement intérieur:</label>
                <input type="text" class="form-control" name="reglement_interieur" value="{{ old('reglement_interieur') }}">
            </div>
             <div class="col-md-6 mb-3">
                <label for="etat_damenagement_du_perimetre">État d'aménagement du périmètre:</label>
                <input type="text" class="form-control" name="etat_damenagement_du_perimetre" value="{{ old('etat_damenagement_du_perimetre') }}">
            </div>
             <div class="col-md-6 mb-3">
                <label for="evaluation_de_la_fonctionnalite">Evaluation de la fonctionnalite:</label>
                <input type="text" class="form-control" name="evaluation_de_la_fonctionnalite" value="{{ old('evaluation_de_la_fonctionnalite') }}">
            </div>
             <div class="col-md-6 mb-3">
                <label for="source_dirrigation">Source dirrigation :</label>
                <input type="text" class="form-control" name="source_dirrigation" value="{{ old('source_dirrigation') }}">
            </div>
             <div class="col-md-6 mb-3">
                <label for="type_de_distribution">Type de distribution :</label>
                <input type="text" class="form-control" name="type_de_distribution" value="{{ old('type_de_distribution') }}">
            </div>
             <div class="col-md-6 mb-3">
                <label for="type_de_pompage">Type de pompage :</label>
                <input type="text" class="form-control" name="type_de_pompage" value="{{ old('type_de_pompage') }}">
            </div>
             <div class="col-md-6 mb-3">
                <label for="observsation_generale">Observation générale:</label>
                <input type="text" class="form-control" name="observsation_generale" value="{{ old('observsation_generale') }}">
            </div>
            </div>

            <div class="modal-footer">
                    <button type="button" id="prevBtn" class="btn btn-secondary" disabled>Précédent</button>
                    <button type="button" id="nextBtn" class="btn btn-primary">Suivant</button>
                    <button type="submit" id="submitBtn" class="btn btn-success" style="display: none;">Enregistrer</button>
                </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
                            <table class="table table-bordered table-striped" id="cooperativesTable">
                                <thead>
                                    <tr>
                                        <th>Wilaya</th>
                                        <th>Moughataa</th>
                                        <th>Commune</th>
                                        <th>Périmètre</th>
                                        <th>Localité</th>
                                        <th>Nom Cooperative</th>
                                        <th>Coordonees GPS</th>
                                        <th>Détails</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cooperatives as $cooperative)
                                        <tr id="row{{ $cooperative->id }}">
                                            <td>{{ $cooperative->wilaya->nom_du_wilaya }}</td>
                                            <td>{{ $cooperative->moughataa->nom_du_moughataa }}</td>
                                            <td>{{ $cooperative->commune->nom_du_commune }}</td>
                                            <td>{{ $cooperative->perimetre->nom_du_perimetre }}</td>
                                            <td>{{ $cooperative->localite->nom_du_localite }}</td>
                                            <td>{{ $cooperative->nom_cooperative }}</td>
                                            <td>{{ $cooperative->coordonnees_gps }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#details{{ $cooperative->id }}">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>

                                            </td>
                                            <td style="width: 5cm;">
                                                <a href="#" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a class="btn btn-info btn-sm" href="{{ url('print_irrigue/' . $cooperative->id) }}">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                                <form action="#" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr id="details{{ $cooperative->id }}" class="collapse">
                                            <td colspan="10">
                                                <strong>Type de Périmètre:</strong> {{ $cooperative->type_perimetre ?? 'Non spécifié' }}<br>
                                                <strong>Status de l'organisation:</strong> {{ $cooperative->status_de_lorganisation ?? 'Non spécifié' }}<br>
                                                <strong>Nombre d'Adhérents:</strong> {{ $cooperative->nombre_adherents ?? 0 }}<br>
                                                <strong>Nombre de Femmes:</strong> {{ $cooperative->nombre_femme ?? 0 }}<br>
                                                <strong>Nom du Président:</strong> {{ $cooperative->nom_du_president ?? 'Non spécifié' }}<br>
                                                <strong>Contact du Président:</strong> {{ $cooperative->contact_du_president ?? 'Non spécifié' }}<br>
                                                <strong>Deuxième Contact:</strong> {{ $cooperative->deuxieme_contact ?? 'Non spécifié' }}<br>
                                                <strong>Type de Document:</strong> {{ $cooperative->type_de_document ?? 'Non spécifié' }}<br>
                                                <strong>Année de Création de l'Exploitation:</strong> {{ $cooperative->annee_creation_de_lexploitation ?? 'Non spécifié' }}<br>
                                                <strong>Superficie Totale:</strong> {{ $cooperative->superficie_totale ?? 'Non spécifié' }}<br>
                                                <strong>Superficie Emblavée Hivernale:</strong> {{ $cooperative->superficie_emblavee_hivernale ?? 'Non spécifié' }}<br>
                                                <strong>Superficie Emblavée Contre-Saison:</strong> {{ $cooperative->superficie_emblavee_contre_sais ?? 'Non spécifié' }}<br>
                                                <strong>Nombre d'Années d'Expérience:</strong> {{ $cooperative->nombre_annee_experience ?? 'Non spécifié' }}<br>
                                                <strong>Spéculation Principale:</strong> {{ $cooperative->speculation_principale ?? 'Non spécifié' }}<br>
                                                <strong>En Campagne Contre-Saison Actuelle:</strong> {{ $cooperative->en_campagne_contre_sais_actuelle ?? 'Non spécifié' }}<br>
                                                <strong>Partant pour Camp Hiver Prochaine:</strong> {{ $cooperative->partant_pour_camp_hiver_prochaine ?? 'Non spécifié' }}<br>
                                                <strong>Type de Semences Utilisées:</strong> {{ $cooperative->type_semences_utilises ?? 'Non spécifié' }}<br>
                                                <strong>Variété de Semences Utilisées:</strong> {{ $cooperative->variete_de_semences_utilises ?? 'Non spécifié' }}<br>
                                                <strong>Mode d'Approvisionnement en Semence:</strong> {{ $cooperative->mode_approvisionnement_en_semence ?? 'Non spécifié' }}<br>
                                                <strong>Lieu d'Approvisionnement:</strong> {{ $cooperative->lieu_approvisionnement ?? 'Non spécifié' }}<br>
                                                <strong>Lieu de Stockage des Semences:</strong> {{ $cooperative->lieu_stockage_des_semences ?? 'Non spécifié' }}<br>
                                                <strong>Quantité de Semence pour Emblaver:</strong> {{ $cooperative->qtite_semence_pour_emblaver ?? 'Non spécifié' }}<br>
                                                <strong>Rendement Moyen en Hivernage:</strong> {{ $cooperative->rendement_moyen_en_hivernage ?? 'Non spécifié' }}<br>
                                                <strong>Rendement Moyen Contre-Saison:</strong> {{ $cooperative->rendement_moyen_contre_sais ?? 'Non spécifié' }}<br>
                                                <strong>Quantité Récoltée en Camp Hiv. 022:</strong> {{ $cooperative->qtite_recoltee_en_camp_hiv_022 ?? 'Non spécifié' }}<br>
                                                <strong>Quantité Récoltée en Camp Contre-Saison 023:</strong> {{ $cooperative->qtite_recoltee_en_camp_contre_sais_023 ?? 'Non spécifié' }}<br>
                                                <strong>Source de Financement:</strong> {{ $cooperative->source_de_financement ?? 'Non spécifié' }}<br>
                                                <strong>Caisse ou Fond de Roulement:</strong> {{ $cooperative->caisse_ou_fond_deroulement ?? 'Non spécifié' }}<br>
                                                <strong>Source de Financement de la Caisse:</strong> {{ $cooperative->source_financement_de_la_caisse ?? 'Non spécifié' }}<br>
                                                <strong>Existence de Fonds pour Renouvellement d'Infrastructures:</strong> {{ $cooperative->existence_fonds_pour_entr_renou_infra ?? 'Non spécifié' }}<br>
                                                <strong>Bureau Exécutif:</strong> {{ $cooperative->bureau_executif ?? 'Non spécifié' }}<br>
                                                <strong>Comment est-il structuré:</strong> {{ $cooperative->comment_est_il_structurer ?? 'Non spécifié' }}<br>
                                                <strong>Règlement Intérieur:</strong> {{ $cooperative->reglement_interieur ?? 'Non spécifié' }}<br>
                                                <strong>État d'Aménagement du Périmètre:</strong> {{ $cooperative->etat_damenagement_du_perimetre ?? 'Non spécifié' }}<br>
                                                <strong>Évaluation de la Fonctionnalité:</strong> {{ $cooperative->evaluation_de_la_fonctionnalite ?? 'Non spécifié' }}<br>
                                                <strong>Source d'Irrigation:</strong> {{ $cooperative->source_dirrigation ?? 'Non spécifié' }}<br>
                                                <strong>Type de Distribution:</strong> {{ $cooperative->type_de_distribution ?? 'Non spécifié' }}<br>
                                                <strong>Type de Pompage:</strong> {{ $cooperative->type_de_pompage ?? 'Non spécifié' }}<br>
                                                <strong>Nombre de GMP:</strong> {{ $cooperative->nombre_de_gmp ?? 'Non spécifié' }}<br>
                                                <strong>Nombre de GMP Fonctionnel:</strong> {{ $cooperative->nombre_de_gmp_fonctionnel ?? 'Non spécifié' }}<br>
                                                <strong>Nombre de Stations de Pompage:</strong> {{ $cooperative->nombre_station_de_pompage ?? 'Non spécifié' }}<br>
                                                <strong>Nombre de Stations de Pompage Fonctionnelles:</strong> {{ $cooperative->nombre_station_pompage_fonctionnel ?? 'Non spécifié' }}<br>
                                                <strong>Type de Main-d'Oeuvre Utilisée:</strong> {{ $cooperative->type_main_doeuvre_utilise ?? 'Non spécifié' }}<br>
                                                <strong>Organisation Appuyant les Coopératives:</strong> {{ $cooperative->organisation_appuyant_les_cooperative ?? 'Non spécifié' }}<br>
                                                <strong>Type de Genre d'Accompagnement Apporté:</strong> {{ $cooperative->type_genre_daccompagnement_apporte ?? 'Non spécifié' }}<br>
                                                <strong>Besoin/Sujets Prioritaires:</strong> {{ $cooperative->besoin_sujet_prioritaires ?? 'Non spécifié' }}<br>
                                                <strong>Satisfait de l'Organisation:</strong> {{ $cooperative->satisfait_de_lorganisation ?? 'Non spécifié' }}<br>
                                                <strong>Motif d'Insatisfaction de l'Organisation:</strong> {{ $cooperative->motif_dinsatisfaction_de_lorganisation ?? 'Non spécifié' }}<br>
                                                <strong>Accord sur Contribution à Haut de 20%:</strong> {{ $cooperative->accord_sur_contrib__a_haut_de_20_percent ?? 'Non spécifié' }}<br>
                                                <strong>Recommandations pour Améliorer l'Exploitation:</strong> {{ $cooperative->recommandation_pour_ameliorer_lexploitation ?? 'Non spécifié' }}<br>
                                                <strong>Observations Générales:</strong> {{ $cooperative->observsation_generale ?? 'Non spécifié' }}<br>
                                                  </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $cooperatives->links() }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
</div>


</div>
</div>
</div>
</div>
</section>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var currentStep = 1;
        var totalSteps = 4;

        // Mettre à jour la barre de progression
        function updateProgressBar() {
            var progress = (currentStep / totalSteps) * 100;
            $('#progressBar').css('width', progress + '%');
        }

        // Afficher l'étape actuelle
        function showStep(step) {
            $('.step').hide();
            $('#step' + step).show();
            if (step == 1) {
                $('#prevBtn').prop('disabled', true);
            } else {
                $('#prevBtn').prop('disabled', false);
            }
            if (step == totalSteps) {
                $('#nextBtn').hide();
                $('#submitBtn').show();
            } else {
                $('#nextBtn').show();
                $('#submitBtn').hide();
            }
            updateProgressBar();
        }

        // Bouton "Suivant"
        $('#nextBtn').click(function() {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        });

        // Bouton "Précédent"
        $('#prevBtn').click(function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        // Afficher la première étape au début
        showStep(currentStep);

        // Logic pour la sélection dynamique des wilayas et autres
        $('#wilaya').change(function() {
            var wilaya_id = $(this).val();
            if (wilaya_id) {
                $('#moughataa').prop('disabled', false);
                $.ajax({
                    url: '/get-moughataas/' + wilaya_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#moughataa').empty().append('<option value="">Sélectionner une Moughataa</option>');
                        $.each(data, function(key, value) {
                            $('#moughataa').append('<option value="' + value.id + '">' + value.nom_du_moughataa + '</option>');
                        });
                    }
                });
            }
        });

        // Logique pour d'autres sélections
        $('#moughataa').change(function() {
            var moughataa_id = $(this).val();
            if (moughataa_id) {
                $('#commune').prop('disabled', false);
                $.ajax({
                    url: '/get-communes/' + moughataa_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#commune').empty().append('<option value="">Sélectionner une Commune</option>');
                        $.each(data, function(key, value) {
                            $('#commune').append('<option value="' + value.id + '">' + value.nom_du_commune + '</option>');
                        });
                    }
                });
            }
        });

        $('#commune').change(function() {
            var commune_id = $(this).val();
            if (commune_id) {
                $('#localite').prop('disabled', false);
                $.ajax({
                    url: '/get-localites/' + commune_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#localite').empty().append('<option value="">Sélectionner une Localité</option>');
                        $.each(data, function(key, value) {
                            $('#localite').append('<option value="' + value.id + '">' + value.nom_du_localite + '</option>');
                        });
                    }
                });
            }
        });

        $('#localite').change(function() {
            var localite_id = $(this).val();
            if (localite_id) {
                $('#perimetre').prop('disabled', false);
                $.ajax({
                    url: '/get-perimetres/' + localite_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#perimetre').empty().append('<option value="">Sélectionner un Périmètre</option>');
                        $.each(data, function(key, value) {
                            $('#perimetre').append('<option value="' + value.id + '">' + value.nom_du_perimetre + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
<script>
    function printTable() {
        var printWindow = window.open('', '', 'height=500,width=800');
        printWindow.document.write('<html><head><title>Impression Détails</title>');
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; margin: 20px; } .cooperative { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; } </style>');
        printWindow.document.write('</head><body>');

        // Ajout du logo et des couleurs
        printWindow.document.write('<img src="{{ asset('template/images/GEREMELOGO.png') }}" alt="Logo" style="width: 150px; margin-bottom: 20px;">');
        printWindow.document.write('<h1 style="text-align: center;">Détails de la Cooperative Irriguée</h1>');

        // Noms des champs à afficher
        var fieldNames = [
            'Wilaya', 'Moughataa', 'Commune', 'Localité', 'Périmètre', 'Nom Cooperative', 'Coordonnées GPS', 'Type Périmètre', 'Status Organisation',
            'Nombre d\'Adhérents', 'Nombre de Femmes', 'Nom du Président', 'Contact Président', 'Deuxième Contact', 'Type Document', 'Année de Création',
            'Superficie Totale', 'Superficie Emblavée Hivernale', 'Superficie Emblavée Contre-Sais', 'Nombre Années Expérience', 'Spéculation Principale',
            'En Campagne Contre-Sais Actuelle', 'Partant pour Camp Hiver Prochaine', 'Type Semences Utilisées', 'Variété Semences Utilisées',
            'Mode Approvisionnement en Semence', 'Lieu Approvisionnement', 'Lieu Stockage des Semences', 'Quantité Semence pour Emblaver', 'Rendement Moyen en Hivernage',
            'Rendement Moyen Contre-Sais', 'Quantité Récoltée en Camp Hiv 022', 'Quantité Récoltée en Camp Contre-Sais 023', 'Source de Financement',
            'Caisse ou Fond de Roulement', 'Source Financement de la Caisse', 'Existence Fonds pour Renouvellement Infrastructure', 'Bureau Exécutif',
            'Comment est-il Structuré', 'Règlement Intérieur', 'État d\'Aménagement du Périmètre', 'Évaluation de la Fonctionnalité', 'Source d\'Irrigation',
            'Type de Distribution', 'Type de Pompage', 'Nombre de GMP', 'Nombre de GMP Fonctionnel', 'Nombre Station de Pompage', 'Nombre Station Pompage Fonctionnel',
            'Type Main d\'Œuvre Utilisée', 'Organisation Appuyant les Coopératives', 'Type Genre d\'Accompagnement Apporté', 'Besoin Sujet Prioritaires',
            'Satisfait de l\'Organisation', 'Motif d\'Insatisfaction de l\'Organisation', 'Accord sur Contrib. à Haut de 20%', 'Recommandation pour Améliorer Exploitation',
            'Observation Générale'
        ];

        // Récupère toutes les lignes
        var rows = document.querySelectorAll('#cooperativesTable tbody tr');
        rows.forEach(function(row) {
            var id = row.id.replace('row', ''); // Extraire l'ID de la ligne
            var detailRow = document.querySelector('#details' + id); // Sélectionner la ligne de détails correspondante

            printWindow.document.write('<div class="cooperative">');
            row.querySelectorAll('td').forEach(function(cell, index) {
                // Exclure la colonne d'actions (boutons)
                if (index > 0 && index <= 8) {
                    printWindow.document.write('<strong>' + fieldNames[index - 1] + ':</strong> ' + cell.innerHTML + '<br>');
                }
            });

            // Imprimer également les détails supplémentaires
            if (detailRow) {
                detailRow.querySelectorAll('td').forEach(function(detailCell) {
                    printWindow.document.write(detailCell.innerHTML + '<br>');
                });
            }

            printWindow.document.write('</div>');
        });

        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }

    function printRow(id) {
        var printWindow = window.open('', '', 'height=500,width=800');
        printWindow.document.write('<html><head><title>Impression Détails</title>');
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; margin: 20px; } .cooperative { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; } </style>');
        printWindow.document.write('</head><body>');

        // Ajout du logo et des couleurs
        printWindow.document.write('<img src="{{ asset('template/images/GEREMELOGO.png') }}" alt="Logo" style="width: 150px; margin-bottom: 20px;">');
        printWindow.document.write('<h1 style="text-align: center;">Détails de la Cooperative Irriguée</h1>');

        // Noms des champs à afficher
        var fieldNames = [
            'Wilaya', 'Moughataa', 'Commune', 'Localité', 'Périmètre', 'Nom Cooperative', 'Coordonnées GPS', 'Type Périmètre', 'Status Organisation',
            'Nombre d\'Adhérents', 'Nombre de Femmes', 'Nom du Président', 'Contact Président', 'Deuxième Contact', 'Type Document', 'Année de Création',
            'Superficie Totale', 'Superficie Emblavée Hivernale', 'Superficie Emblavée Contre-Sais', 'Nombre Années Expérience', 'Spéculation Principale',
            'En Campagne Contre-Sais Actuelle', 'Partant pour Camp Hiver Prochaine', 'Type Semences Utilisées', 'Variété Semences Utilisées',
            'Mode Approvisionnement en Semence', 'Lieu Approvisionnement', 'Lieu Stockage des Semences', 'Quantité Semence pour Emblaver', 'Rendement Moyen en Hivernage',
            'Rendement Moyen Contre-Sais', 'Quantité Récoltée en Camp Hiv 022', 'Quantité Récoltée en Camp Contre-Sais 023', 'Source de Financement',
            'Caisse ou Fond de Roulement', 'Source Financement de la Caisse', 'Existence Fonds pour Renouvellement Infrastructure', 'Bureau Exécutif',
            'Comment est-il Structuré', 'Règlement Intérieur', 'État d\'Aménagement du Périmètre', 'Évaluation de la Fonctionnalité', 'Source d\'Irrigation',
            'Type de Distribution', 'Type de Pompage', 'Nombre de GMP', 'Nombre de GMP Fonctionnel', 'Nombre Station de Pompage', 'Nombre Station Pompage Fonctionnel',
            'Type Main d\'Œuvre Utilisée', 'Organisation Appuyant les Coopératives', 'Type Genre d\'Accompagnement Apporté', 'Besoin Sujet Prioritaires',
            'Satisfait de l\'Organisation', 'Motif d\'Insatisfaction de l\'Organisation', 'Accord sur Contrib. à Haut de 20%', 'Recommandation pour Améliorer Exploitation',
            'Observation Générale'
        ];

        // Récupère les cellules de la ligne sélectionnée
        var cells = document.querySelectorAll('#row' + id + ' td');
        var detailRow = document.querySelector('#details' + id); // Sélectionner la ligne de détails correspondante

        printWindow.document.write('<div class="cooperative">');
        cells.forEach(function(cell, index) {
            // Exclure la colonne d'actions (boutons)
            if (index > 0 && index <= fieldNames.length) {
                printWindow.document.write('<strong>' + fieldNames[index - 1] + ':</strong> ' + cell.innerHTML + '<br>');
            }
        });

        // Imprimer également les détails supplémentaires
        if (detailRow) {
            detailRow.querySelectorAll('td').forEach(function(detailCell) {
                printWindow.document.write(detailCell.innerHTML + '<br>');
            });
        }

        printWindow.document.write('</div>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }



<!-- Google Maps HTML -->
                            <div class="container">
                                <div id="map" style="with:100%;height:300px;"></div>
                            </div>
// map code start
                            function showMap(lat,long){
                                var coord = { lat:lat, lng:long };

                                new google.maps.Maps(
                                    document.getElementById("map"),
                                    {
                                        zoom: 10,
                                        center: coord
                                    }
                                )
                            }
                            showMap(0,0);
</script>
@endsection
