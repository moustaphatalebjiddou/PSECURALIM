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
                            <h3 class="card-title">Modifier une enquête d'un périmètre irrigué</h3>
                        </div>
                        <div class="card-body">
                            <form id="multiStepForm" action="{{ route('identification_irrigues.update', $irrigue->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                  <!-- Barre de progression -->
        <div class="progress mb-4">
            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="step" id="step1">
            <h4 style="color: blue;">Étape 1 : Identification</h4>
            <ul>
                <li style="color: rgb(47, 15, 162);"> Localisation</li>
            </ul>

                                <!-- Sélection de la Wilaya -->
                                <label for="wilaya">Wilaya:</label>
                                <select name="wilaya_id" id="wilaya" required>
                                    <option value="">Sélectionner une Wilaya</option>
                                    @foreach($wilayas as $wilaya)
                                        <option value="{{ $wilaya->id }}" {{ $irrigue->wilaya_id == $wilaya->id ? 'selected' : '' }}>{{ $wilaya->nom_du_wilaya }}</option>
                                    @endforeach
                                </select>

                                <!-- Sélection de la Moughataa -->
                                <label for="moughataa">Moughataa:</label>
                                <select name="moughataa_id" id="moughataa" required>
                                    <option value="{{ $irrigue->moughataa_id }}">{{ $irrigue->moughataa->nom_moughataa ?? 'Sélectionner une Moughataa' }}</option>
                                </select>

                                <!-- Sélection de la Commune -->
                                <label for="commune">Commune:</label>
                                <select name="commune_id" id="commune" required>
                                    <option value="{{ $irrigue->commune_id }}">{{ $irrigue->commune->nom_commune ?? 'Sélectionner une Commune' }}</option>
                                </select>

                                <!-- Sélection de la Localité -->
                                <label for="localite">Localité:</label>
                                <select name="localite_id" id="localite" required>
                                    <option value="{{ $irrigue->localite_id }}">{{ $irrigue->localite->nom_localite ?? 'Sélectionner une Localité' }}</option>
                                </select>

                                <!-- Sélection du Périmètre -->
                                <label for="perimetre">Périmètre:</label>
                                <select name="perimetre_id" id="perimetre" required>
                                    <option value="{{ $irrigue->perimetre_id }}">{{ $irrigue->perimetre->nom_perimetre ?? 'Sélectionner un Périmètre' }}</option>
                                </select>

                                 <!-- Autres champs -->
                                 <div class="form-group">
                                    <label for="date_amenagement">Date d'Aménagement</label>
                                    <input type="date" name="date_amenagement" id="date_amenagement" class="form-control" value="{{ $irrigue->date_amenagement }}" required>
                                    @error('date_amenagement')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label>Vocation du Périmètre:</label>
                                <div>
                                    <label for="vocation_rizicole">
                                        <input type="checkbox" name="vocation_du_perimetre[]" id="vocation_rizicole" value="rizicole" {{ in_array('rizicole', $irrigue->vocation_du_perimetre) ? 'checked' : '' }}>
                                        Rizicole
                                    </label>
                                </div>
                                <div>
                                    <label for="vocation_maraicher">
                                        <input type="checkbox" name="vocation_du_perimetre[]" id="vocation_maraicher" value="maraicher" {{ in_array('maraicher', $irrigue->vocation_du_perimetre) ? 'checked' : '' }}>
                                        Maraicher
                                    </label>
                                </div>
                                <div>
                                    <label for="vocation_fourrage">
                                        <input type="checkbox" name="vocation_du_perimetre[]" id="vocation_fourrage" value="fourrage" {{ in_array('fourrage', $irrigue->vocation_du_perimetre) ? 'checked' : '' }}>
                                        Fourrage
                                    </label>
                                </div>
                                <div>
                                    <label for="vocation_mixte">
                                        <input type="checkbox" name="vocation_du_perimetre[]" id="vocation_mixte" value="mixte" {{ in_array('mixte', $irrigue->vocation_du_perimetre) ? 'checked' : '' }}>
                                        Mixte
                                    </label>
                                </div>

                    <ul>
                        <li style="color: rgb(47, 15, 162);"> Identité de l'exploitant</li>
                    </ul>

                                <!-- Champ nature_de_l_organisation -->
                                <div class="form-group">
                                    <label for="nature_de_l_organisation">Nature de l'Organisation</label>
                                    <input type="text" name="nature_de_l_organisation" class="form-control" id="nature_de_l_organisation" value="{{ $irrigue->nature_de_l_organisation }}" required>
                                </div>

                                <!-- Champ nombre_adherents -->
                                <div class="form-group">
                                    <label for="nombre_adherents">Nombre d'adhérents</label>
                                    <input type="number" name="nombre_adherents" class="form-control" id="nombre_adherents" value="{{ $irrigue->nombre_adherents }}" required>
                                </div>

                                <!-- Champ nombre_homme -->
                                <div class="form-group">
                                    <label for="nombre_homme">Nombre d'Hommes</label>
                                    <input type="number" name="nombre_homme" class="form-control" id="nombre_homme" value="{{ $irrigue->nombre_homme }}" required>
                                </div>

                                <!-- Champ nombre_femme -->
                                <div class="form-group">
                                    <label for="nombre_femme">Nombre de Femmes</label>
                                    <input type="number" name="nombre_femme" class="form-control" id="nombre_femme" value="{{ $irrigue->nombre_femme }}" required>
                                </div>

                                <!-- Champ date_regul_stru_exploitant -->
                                <div class="form-group">
                                    <label for="date_regul_stru_exploitant">Date de Régularisation de la Structure Exploitante</label>
                                    <input type="date" name="date_regul_stru_exploitant" class="form-control" id="date_regul_stru_exploitant" value="{{ $irrigue->date_regul_stru_exploitant }}">
                                </div>

                                <!-- Champ numero_recepi_reconn -->
                                <div class="form-group">
                                    <label for="recepisse_reconnaissance">Numéro de Récepissé de Reconnaissance</label>
                                    <input type="text" name="recepisse_reconnaissance" class="form-control" id="recepisse_reconnaissance" value="{{ $irrigue->recepisse_reconnaissance }}">
                                </div>

                                <!-- Champ nom_du_dirigeant_strc_exploitant -->
                                <div class="form-group">
                                    <label for="nom_du_dirigeant_strc_exploitant">Nom du Dirigeant de la Structure Exploitante</label>
                                    <input type="text" name="nom_du_dirigeant_strc_exploitant" class="form-control" id="nom_du_dirigeant_strc_exploitant" value="{{ $irrigue->nom_du_dirigeant_strc_exploitant }}">
                                </div>

                                <!-- Champ telephone -->
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" value="{{ $irrigue->telephone }}" required>
                                </div>

                </div>

                <div class="step d-none" id="step2">
                    <h4>Étape 2 : Aspects Fonciers</h4>
                    <ul>
                        <li style="color: rgb(47, 15, 162);"> Origine du droit acquis</li>
                    </ul>

                    <!-- Superficie mise en valeur -->
                    <div class="form-group">
                        <label for="superficie_mise_en_valeur">Superficie Mise en Valeur</label>
                        <input type="text" name="superficie_mise_en_valeur" id="superficie_mise_en_valeur" class="form-control" value="{{ old('superficie_mise_en_valeur', $irrigue->superficie_mise_en_valeur) }}" required>
                        @error('superficie_mise_en_valeur')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Date de mise en valeur -->
                    <div class="form-group">
                        <label for="date_de_mise_en_valeur">Date de Mise en Valeur</label>
                        <input type="date" name="date_de_mise_en_valeur" id="date_de_mise_en_valeur" class="form-control" value="{{ old('date_de_mise_en_valeur', $irrigue->date_de_mise_en_valeur) }}" required>
                        @error('date_de_mise_en_valeur')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Propriété du terrain -->
                    <div class="form-group">
                        <label for="propriete_terrain">Le terrain est-il propriété :</label>
                        <select name="propriete_terrain" id="propriete_terrain" class="form-control" required>
                            <option value="collective" {{ old('propriete_terrain', $irrigue->propriete_terrain) == 'collective' ? 'selected' : '' }}>Collective</option>
                            <option value="individuelle" {{ old('propriete_terrain', $irrigue->propriete_terrain) == 'individuelle' ? 'selected' : '' }}>Individuelle</option>
                        </select>
                        @error('propriete_terrain')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mode d'acquisition (Cases à cocher) -->
                    <div class="form-group">
                        <label for="mode_acquisition">Mode d'acquisition du droit :</label><br>
                        <input type="checkbox" name="mode_acquisition[]" value="acheté" {{ in_array('acheté', old('mode_acquisition', $irrigue->mode_acquisition ?? [])) ? 'checked' : '' }}> Acheté<br>
                        <input type="checkbox" name="mode_acquisition[]" value="loué" {{ in_array('loué', old('mode_acquisition', $irrigue->mode_acquisition ?? [])) ? 'checked' : '' }}> Loué<br>
                        <input type="checkbox" name="mode_acquisition[]" value="hérité" {{ in_array('hérité', old('mode_acquisition', $irrigue->mode_acquisition ?? [])) ? 'checked' : '' }}> Hérité<br>
                        <input type="checkbox" name="mode_acquisition[]" value="donné" {{ in_array('donné', old('mode_acquisition', $irrigue->mode_acquisition ?? [])) ? 'checked' : '' }}> Donné<br>
                        <input type="checkbox" name="mode_acquisition[]" value="prêté" {{ in_array('prêté', old('mode_acquisition', $irrigue->mode_acquisition ?? [])) ? 'checked' : '' }}> Prêté<br>
                    </div>

                    <!-- Détails de la location -->
                    <div class="form-group" id="loueDetails" style="{{ in_array('loué', old('mode_acquisition', $irrigue->mode_acquisition ?? [])) ? '' : 'display: none;' }}">
                        <label for="loue_a_qui">Loué à qui :</label>
                        <input type="text" name="loue_a_qui" class="form-control" value="{{ old('loue_a_qui', $irrigue->loue_a_qui) }}"><br>

                        <label for="loue_quel_prix">À quel prix :</label>
                        <input type="text" name="loue_quel_prix" class="form-control" value="{{ old('loue_quel_prix', $irrigue->loue_quel_prix) }}"><br>

                        <label for="loue_pour_combien_de_temps">Pour combien de temps :</label>
                        <input type="text" name="loue_pour_combien_de_temps" class="form-control" value="{{ old('loue_pour_combien_de_temps', $irrigue->loue_pour_combien_de_temps) }}"><br>

                        <label for="loue_par_contrat">Par contrat :</label><br>
                        <input type="radio" name="loue_par_contrat" value="écrit" {{ old('loue_par_contrat', $irrigue->loue_par_contrat) == 'écrit' ? 'checked' : '' }}> Écrit<br>
                        <input type="radio" name="loue_par_contrat" value="informel" {{ old('loue_par_contrat', $irrigue->loue_par_contrat) == 'informel' ? 'checked' : '' }}> Informel<br>
                    </div>

                    <!-- Détails du prêt -->
                    <div class="form-group" id="preteDetails" style="{{ in_array('prêté', old('mode_acquisition', $irrigue->mode_acquisition ?? [])) ? '' : 'display: none;' }}">
                        <label for="prete_par_qui">Prêté par qui :</label>
                        <input type="text" name="prete_par_qui" class="form-control" value="{{ old('prete_par_qui', $irrigue->prete_par_qui) }}"><br>

                        <label for="prete_conditions">Conditions :</label>
                        <textarea name="prete_conditions" class="form-control">{{ old('prete_conditions', $irrigue->prete_conditions) }}</textarea><br>

                        <label for="prete_pour_combien_de_temps">Pour combien de temps :</label>
                        <input type="text" name="prete_pour_combien_de_temps" class="form-control" value="{{ old('prete_pour_combien_de_temps', $irrigue->prete_pour_combien_de_temps) }}"><br>

                        <label for="prete_par_contrat">Par contrat :</label><br>
                        <input type="radio" name="prete_par_contrat" value="écrit" {{ old('prete_par_contrat', $irrigue->prete_par_contrat) == 'écrit' ? 'checked' : '' }}> Écrit<br>
                        <input type="radio" name="prete_par_contrat" value="informel" {{ old('prete_par_contrat', $irrigue->prete_par_contrat) == 'informel' ? 'checked' : '' }}> Informel<br>
                    </div>

                    <!-- Autorisations diverses -->
                    <div class="form-group">
                        <label>Autorisations :</label><br>
                        <input type="checkbox" name="peut_vendre_a_etrangers" value="oui" {{ old('peut_vendre_a_etrangers', $irrigue->peut_vendre_a_etrangers) == 'oui' ? 'checked' : '' }}> Les membres de la coopérative peuvent-ils vendre leur parcelle à des étrangers<br>
                        <input type="checkbox" name="peut_vendre_a_membres" value="oui" {{ old('peut_vendre_a_membres', $irrigue->peut_vendre_a_membres) == 'oui' ? 'checked' : '' }}> Les membres peuvent-ils vendre leur parcelle à d’autres membres de la coopérative<br>
                        <input type="checkbox" name="peut_preter_a_etrangers" value="oui" {{ old('peut_preter_a_etrangers', $irrigue->peut_preter_a_etrangers) == 'oui' ? 'checked' : '' }}> Les membres peuvent-ils prêter leur parcelle à des étrangers<br>
                        <input type="checkbox" name="peut_louer_a_membres" value="oui" {{ old('peut_louer_a_membres', $irrigue->peut_louer_a_membres) == 'oui' ? 'checked' : '' }}> Les membres peuvent-ils louer leur parcelle à d’autres membres<br>
                    </div>

                    <!-- Nombre d'étrangers cultivant -->
                    <div class="form-group">
                        <label for="nombre_etrangers_cultivant">Combien d’étrangers à la coopérative cultivent ?</label>
                        <input type="text" name="nombre_etrangers_cultivant" id="nombre_etrangers_cultivant" class="form-control" value="{{ old('nombre_etrangers_cultivant', $irrigue->nombre_etrangers_cultivant) }}" required>
                        @error('nombre_etrangers_cultivant')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="step" id="step3">

                    <h4>Étape 3 : ASPECTS ÉCONOMIQUES ET SOCIAUX</h4>
                    <ul>
                        <li style="color: rgb(47, 15, 162);">Responsabilité de la distribution des parcelles</li>
                    </ul>

                    <!-- Responsabilité de la distribution des parcelles -->
                    <div class="form-group">
                        <label>Responsabilité de la distribution des parcelles :</label> <br>
                        <input type="checkbox" name="organe_de_gestion" value="1" {{ old('organe_de_gestion', $irrigue->organe_de_gestion) ? 'checked' : '' }}> Organe de gestion <br>
                        <input type="checkbox" name="djamaa" value="1" {{ old('djamaa', $irrigue->djamaa) ? 'checked' : '' }}> Djamaa <br>
                        <input type="checkbox" name="chef_village" value="1" {{ old('chef_village', $irrigue->chef_village) ? 'checked' : '' }}> Chef du village <br>
                    </div>

                    <!-- Droit de propriété pour les femmes -->
                    <label>Les femmes ont le droit de propriété à la distribution initiale du partage des parcelles par :</label> <br>
                    <input type="checkbox" name="par_rachat" value="1" {{ old('par_rachat', $irrigue->par_rachat) ? 'checked' : '' }}> Par rachat <br>
                    <input type="checkbox" name="par_voie_heritage" value="1" {{ old('par_voie_heritage', $irrigue->par_voie_heritage) ? 'checked' : '' }}> Par voie d’héritage <br>

                    <!-- Droit de propriété pour les femmes -->
                    <label>Payent-elles ? :</label> <br>
                    <input type="checkbox" name="payent_elles_nature" value="1" {{ old('payent_elles_nature', $irrigue->payent_elles_nature) ? 'checked' : '' }}> Payent-elles en nature <br>
                    <input type="checkbox" name="payent_elles_espece" value="1" {{ old('payent_elles_espece', $irrigue->payent_elles_espece) ? 'checked' : '' }}> Payent-elles en espèce <br>
                    <input type="checkbox" name="payent_elles_un_loyer" value="1" {{ old('payent_elles_un_loyer', $irrigue->payent_elles_un_loyer) ? 'checked' : '' }}> Payent-elles un loyer<br>
                    <input type="checkbox" name="payent_elles_un_rempechen" value="1" {{ old('payent_elles_un_rempechen', $irrigue->payent_elles_un_rempechen) ? 'checked' : '' }}> Payent-elles un rempechen <br>
                    <input type="checkbox" name="payent_elles_assakal" value="1" {{ old('payent_elles_assakal', $irrigue->payent_elles_assakal) ? 'checked' : '' }}> Payent-elles un assakal <br>

                    <!-- Nombre de femmes exploitantes -->
                    <div class="form-group">
                        <label for="nombre_femmes_exploitantes">Quel est le nombre des femmes exploitantes :</label> <br>
                        <input type="number" class="form-control" id="nombre_femmes_exploitantes" name="nombre_femmes_exploitantes" value="{{ old('nombre_femmes_exploitantes', $irrigue->nombre_femmes_exploitantes) }}"> <br>
                    </div>

                    <!-- Spéculations pratiquées -->
                    <div class="form-group">
                        <label>Spéculations pratiquées :</label> <br>
                        <input type="text" name="speculations_pratiquees" class="form-control" id="speculations_pratiquees" value="{{ old('speculations_pratiquees', $irrigue->speculations_pratiquees) }}">
                    </div>

                    <!-- Rendement par spéculation -->
                    <div class="form-group">
                        <label>Rendement par spéculation à l’hectare :</label> <br>
                        <input type="text" class="form-control" name="rendement_par_spec_a_hectare" id="rendement_par_spec_a_hectare" value="{{ old('rendement_par_spec_a_hectare', $irrigue->rendement_par_spec_a_hectare) }}"><br>
                    </div>

                    <!-- La variété de semences -->
                    <div class="form-group">
                        <label for="variete_de_semences">La variété de semences :</label> <br>
                        <input class="form-control" type="text" name="variete_de_semences" id="variete_de_semences" value="{{ old('variete_de_semences', $irrigue->variete_de_semences) }}"> <br>
                    </div>

                    <!-- cycle_speculations -->
                    <div>
                        <label for="cycle_speculations">Cycle de spéculations :</label><br>
                        <input type="text" name="cycle_speculations" id="cycle_speculations" class="form-control" value="{{ old('cycle_speculations', $irrigue->cycle_speculations) }}">
                    </div>

                    <!-- Crédit de l'État -->
                    <div class="form-group">
                        <label>Avez-vous bénéficié d’un crédit de l'État ou de ses institutions spécialisées ?</label><br>
                        <input type="radio" name="benefi_credit_etat_institutions_specialisees" value="oui" {{ old('benefi_credit_etat_institutions_specialisees', $irrigue->benefi_credit_etat_institutions_specialisees) == 'oui' ? 'checked' : '' }}> Oui <br>
                        <input type="radio" name="benefi_credit_etat_institutions_specialisees" value="non" {{ old('benefi_credit_etat_institutions_specialisees', $irrigue->benefi_credit_etat_institutions_specialisees) == 'non' ? 'checked' : '' }}> Non <br>
                    </div>

                    <!-- Crédit auprès d’une banque privée -->
                    <div class="form-group">
                        <label>Avez-vous contracté un crédit auprès d’une banque privée ?</label> <br>
                        <input type="radio" name="contracte_credit_banque_privee" value="oui" {{ old('contracte_credit_banque_privee', $irrigue->contracte_credit_banque_privee) == 'oui' ? 'checked' : '' }}> Oui <br>
                        <input type="radio" name="contracte_credit_banque_privee" value="non" {{ old('contracte_credit_banque_privee', $irrigue->contracte_credit_banque_privee) == 'non' ? 'checked' : '' }}> Non <br>
                    </div>

                    <div class="form-group">
                        <label>Avez-vous déjà demandé un crédit auprès d’une banque privée ?</label> <br>
                        <input type="radio" name="demande_credit_banque_privee" value="oui" onclick="togglePourquoi(false)" {{ old('demande_credit_banque_privee', $irrigue->demande_credit_banque_privee) == 'oui' ? 'checked' : '' }}> Oui <br>
                        <input type="radio" name="demande_credit_banque_privee" value="non" onclick="togglePourquoi(true)" {{ old('demande_credit_banque_privee', $irrigue->demande_credit_banque_privee) == 'non' ? 'checked' : '' }}> Non <br>
                    </div>

                    <!-- Détails de crédit demandé auprès d'une banque privée (Affiché si "Non" est coché) -->
                    <div class="form-group" id="pourquoiDetails" style="display: {{ old('demande_credit_banque_privee', $irrigue->demande_credit_banque_privee) == 'non' ? 'block' : 'none' }};">
                        <label for="pourquoi">Pourquoi :</label> <br>
                        <input type="text" name="pourquoi" class="form-control" value="{{ old('pourquoi', $irrigue->pourquoi) }}"><br>
                    </div>

                </div>


                <div class="step d-none" id="step4">
                    <h4>Étape 4 : Difficultés rencontrées</h4>

                    <!-- Difficultés rencontrées -->
                    <div class="form-group">
                        <label>Difficultés rencontrées :</label> <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="stockage" {{ in_array('stockage', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Problème de stockage <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="formation" {{ in_array('formation', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Problème de formation <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="commercialisation" {{ in_array('commercialisation', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Problème de commercialisation <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="financier" {{ in_array('financier', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Problème financier <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="approvisionnement" {{ in_array('approvisionnement', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Approvisionnement en eau <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="encadrement" {{ in_array('encadrement', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Encadrement technique <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="machine" {{ in_array('machine', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Problème de machine <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="cloture" {{ in_array('cloture', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Problème de clôture <br>
                        <input type="checkbox" name="difficultes_rencontrees[]" value="canalisation" {{ in_array('canalisation', old('difficultes_rencontrees', $irrigue->difficultes_rencontrees ?? [])) ? 'checked' : '' }}> Problème de canalisation <br>
                    </div>

                    <!-- Autres problèmes -->
                    <div class="form-group">
                        <label for="autres_problemes">Autres problèmes :</label> <br>
                        <input type="text" class="form-control" id="autres_problemes" name="autres_problemes" value="{{ old('autres_problemes', $irrigue->autres_problemes) }}">
                    </div>

                </div>

    <!-- Boutons de navigation -->
        <div class="d-flex justify-content-between">
            <button type="button" id="prevBtn" class="btn btn-secondary d-none" onclick="prevStep()">Précédent</button>
            <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextStep()">Suivant</button>
            <button type="submit" id="submitBtn" class="btn btn-success d-none">Soumettre</button>
        </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let currentStep = 1;

            function showStep(step) {
                // Masquer toutes les étapes
                document.querySelectorAll('.step').forEach((stepDiv) => stepDiv.classList.add('d-none'));

                // Afficher l'étape actuelle
                document.getElementById('step' + step).classList.remove('d-none');

                // Mettre à jour les boutons
                if (step === 1) {
                    document.getElementById('prevBtn').classList.add('d-none');
                } else {
                    document.getElementById('prevBtn').classList.remove('d-none');
                }

                if (step === 4) {
                    document.getElementById('nextBtn').classList.add('d-none');
                    document.getElementById('submitBtn').classList.remove('d-none');
                } else {
                    document.getElementById('nextBtn').classList.remove('d-none');
                    document.getElementById('submitBtn').classList.add('d-none');
                }

                // Mettre à jour la barre de progression
                const progress = (step - 1) * 25;
                document.getElementById('progressBar').style.width = progress + '%';
            }

            function nextStep() {
                if (currentStep < 4) {
                    currentStep++;
                    showStep(currentStep);
                }
            }

            function prevStep() {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            }

            // Initialiser l'étape 1 au chargement
            document.addEventListener('DOMContentLoaded', function() {
                showStep(currentStep);
            });

            // Soumission AJAX du formulaire
            document.getElementById('multiStepForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Empêcher le rechargement de la page

                // Récupérer les données du formulaire
                let formData = new FormData(this);

                // Envoyer la requête AJAX
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // Si la soumission est réussie, rediriger ou afficher un message de succès
                        alert('Formulaire soumis avec succès !');
                        window.location.href = '/identification-irrigues'; // Redirection vers une page de succès
                    } else {
                        // Gérer les erreurs
                        return response.json().then(errors => {
                            console.log(errors);
                            alert('Une erreur s\'est produite. Veuillez vérifier les champs.');
                        });
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la soumission:', error);
                    alert('Erreur de connexion, veuillez réessayer.');
                });
            });
        </script>
<!-- JavaScript pour la logique conditionnelle -->
<script>
    function togglePourquoi(show) {
        // Si "Non" est coché, affiche le champ "Pourquoi", sinon cache-le
        var pourquoiDetails = document.getElementById('pourquoiDetails');
        if (show) {
            pourquoiDetails.style.display = 'block';
        } else {
            pourquoiDetails.style.display = 'none';
        }
    }
 // Afficher/Masquer les détails de la location
 document.getElementById('loue').addEventListener('change', function() {
        document.getElementById('loueDetails').style.display = this.checked ? 'block' : 'none';
    });

    // Afficher/Masquer les détails du prêt
    document.getElementById('prete').addEventListener('change', function() {
        document.getElementById('preteDetails').style.display = this.checked ? 'block' : 'none';
    });
     // Afficher/Masquer les détails de certificat wali
 document.getElementById('certificat_de_propriete_wali').addEventListener('change', function() {
        document.getElementById('certificatwaliDetails').style.display = this.checked ? 'block' : 'none';
    });

    // Afficher/Masquer les détails du certificat hakem
    document.getElementById('certificat_de_propriete_hakem').addEventListener('change', function() {
        document.getElementById('certificathakemDetails').style.display = this.checked ? 'block' : 'none';
    });


</script>


<!-- Boutons de navigation -->
<div class="d-flex justify-content-between">
    <button type="button" id="prevBtn" class="btn btn-secondary d-none" onclick="prevStep()">Précédent</button>
    <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextStep()">Suivant</button>
    <button type="submit" id="submitBtn" class="btn btn-success d-none">Soumettre</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<script>
    let currentStep = 1;

    function showStep(step) {
        // Masquer toutes les étapes
        document.querySelectorAll('.step').forEach((stepDiv) => stepDiv.classList.add('d-none'));

        // Afficher l'étape actuelle
        document.getElementById('step' + step).classList.remove('d-none');

        // Mettre à jour les boutons
        if (step === 1) {
            document.getElementById('prevBtn').classList.add('d-none');
        } else {
            document.getElementById('prevBtn').classList.remove('d-none');
        }

        if (step === 4) {
            document.getElementById('nextBtn').classList.add('d-none');
            document.getElementById('submitBtn').classList.remove('d-none');
        } else {
            document.getElementById('nextBtn').classList.remove('d-none');
            document.getElementById('submitBtn').classList.add('d-none');
        }

        // Mettre à jour la barre de progression
        const progress = (step - 1) * 25;
        document.getElementById('progressBar').style.width = progress + '%';
    }

    function nextStep() {
        if (currentStep < 4) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    // Initialiser l'étape 1 au chargement
    document.addEventListener('DOMContentLoaded', function() {
        showStep(currentStep);
    });

    // Soumission AJAX du formulaire
    document.getElementById('multiStepForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêcher le rechargement de la page

        // Récupérer les données du formulaire
        let formData = new FormData(this);

        // Envoyer la requête AJAX
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-Token': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (response.ok) {
                // Si la soumission est réussie, rediriger ou afficher un message de succès
                alert('Formulaire soumis avec succès !');
                window.location.href = '/identification-irrigues'; // Redirection vers une page de succès
            } else {
                // Gérer les erreurs
                return response.json().then(errors => {
                    console.log(errors);
                    alert('Une erreur s\'est produite. Veuillez vérifier les champs.');
                });
            }
        })
        .catch(error => {
            console.error('Erreur lors de la soumission:', error);
            alert('Erreur de connexion, veuillez réessayer.');
        });
    });
</script>

<!-- JavaScript pour la logique conditionnelle -->
<script>
    function togglePourquoi(show) {
        // Si "Non" est coché, affiche le champ "Pourquoi", sinon cache-le
        var pourquoiDetails = document.getElementById('pourquoiDetails');
        pourquoiDetails.style.display = show ? 'block' : 'none';
    }

    // Afficher/Masquer les détails de la location
    document.getElementById('loue').addEventListener('change', function() {
        document.getElementById('loueDetails').style.display = this.checked ? 'block' : 'none';
    });

    // Afficher/Masquer les détails du prêt
    document.getElementById('prete').addEventListener('change', function() {
        document.getElementById('preteDetails').style.display = this.checked ? 'block' : 'none';
    });

    // Afficher/Masquer les détails de certificat wali
    document.getElementById('certificat_de_propriete_wali').addEventListener('change', function() {
        document.getElementById('certificatwaliDetails').style.display = this.checked ? 'block' : 'none';
    });

    // Afficher/Masquer les détails du certificat hakem
    document.getElementById('certificat_de_propriete_hakem').addEventListener('change', function() {
        document.getElementById('certificathakemDetails').style.display = this.checked ? 'block' : 'none';
    });
</script>

@endsection
