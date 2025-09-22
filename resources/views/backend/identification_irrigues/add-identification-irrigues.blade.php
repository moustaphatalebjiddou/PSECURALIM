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
                            <h3 class="card-title">Ajouter une enquete d'un perimetre irriguée</h3>
                        </div>
                        <div class="card-body">
                            <form id="multiStepForm"  action="{{ route('identification_irrigues.store') }}" method="POST">
                                @csrf
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
                                        <option value="{{ $wilaya->id }}">{{ $wilaya->nom_du_wilaya }}</option>
                                    @endforeach
                                </select>

                                <!-- Sélection de la Moughataa -->
                                <label for="moughataa">Moughataa:</label>
                                <select name="moughataa_id" id="moughataa" required disabled></select>

                                <!-- Sélection de la Commune -->
                                <label for="commune">Commune:</label>
                                <select name="commune_id" id="commune" required disabled></select>

                                <!-- Sélection de la Localité -->
                                <label for="localite">Localité:</label>
                                <select name="localite_id" id="localite" required disabled></select>

                                <!-- Sélection du Périmètre -->
                                <label for="perimetre">Périmètre:</label>
                                <select name="perimetre_id" id="perimetre" required disabled></select>

                                 <!-- Autres champs -->
                                 <div class="form-group">
                                    <label for="date_amenagement">Date d'Aménagement</label>
                                    <input type="date" name="date_amenagement" id="date_amenagement" class="form-control" required>
                                    @error('date_amenagement')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label>Vocation du Périmètre:</label>
                                <div>
                                    <label for="vocation_rizicole">
                                        <input type="checkbox" name="vocation_du_perimetre[]" id="vocation_rizicole" value="rizicole">
                                        Rizicole
                                    </label>
                                </div>
                                <div>
                                    <label for="vocation_maraicher">
                                        <input type="checkbox" name="vocation_du_perimetre[]" id="vocation_maraicher" value="maraicher">
                                        Maraicher
                                    </label>
                                </div>
                                <div>
                                    <label for="vocation_fourrage">
                                        <input type="checkbox" name="vocation_du_perimetre[]" id="vocation_fourrage" value="fourrage">
                                        Fourrage
                                    </label>
                                </div>
                                <div>
                                    <label for="vocation_mixte">
                                        <input type="checkbox" name="vocation_du_perimetre[]" id="vocation_mixte" value="mixte">
                                        Mixte
                                    </label>
                                </div>

                    <ul>
                        <li style="color: rgb(47, 15, 162);"> Identite de l'exploitant</li>
                    </ul>



                                <!-- Champ nature_de_l_organisation -->
                                <div class="form-group">
                                    <label for="nature_de_l_organisation">Nature de l'Organisation</label>
                                    <input type="text" name="nature_de_l_organisation" class="form-control" id="nature_de_l_organisation" required>
                                </div>

                                <!-- Champ nombre_adherents -->
                                <div class="form-group">
                                    <label for="nombre_adherents">Nombre d'adhérents</label>
                                    <input type="number" name="nombre_adherents" class="form-control" id="nombre_adherents" required>
                                </div>

                                <!-- Champ nombre_homme -->
                                <div class="form-group">
                                    <label for="nombre_homme">Nombre d'Hommes</label>
                                    <input type="number" name="nombre_homme" class="form-control" id="nombre_homme" required>
                                </div>

                                <!-- Champ nombre_femme -->
                                <div class="form-group">
                                    <label for="nombre_femme">Nombre de Femmes</label>
                                    <input type="number" name="nombre_femme" class="form-control" id="nombre_femme" required>
                                </div>

                                <!-- Champ date_regul_stru_exploitant -->
                                <div class="form-group">
                                    <label for="date_regul_stru_exploitant">Date de Régularisation de la Structure Exploitante</label>
                                    <input type="date" name="date_regul_stru_exploitant" class="form-control" id="date_regul_stru_exploitant" required>
                                </div>

                                <!-- Champ date_denquete -->
                                <div class="form-group">
                                    <label for="date_denquete">Date d'enquete</label>
                                    <input type="date" name="date_denquete" class="form-control" id="date_denquete" required>
                                </div>

                                <!-- Champ numero_recepi_reconn -->
                                <div class="form-group">
                                    <label for="recepisse_reconnaissance">Numéro de Récepissé de Reconnaissance</label>
                                    <input type="text" name="recepisse_reconnaissance" class="form-control" id="recepisse_reconnaissance" required>
                                </div>

                                <!-- Champ nom_du_dirigeant_strc_exploitant -->
                                <div class="form-group">
                                    <label for="nom_du_dirigeant_strc_exploitant">Nom du Dirigeant de la Structure Exploitante</label>
                                    <input type="text" name="nom_du_dirigeant_strc_exploitant" class="form-control" id="nom_du_dirigeant_strc_exploitant" required>
                                </div>

                                <!-- Champ telephone -->
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" required>
                                </div>

                </div>

                <div class="step d-none" id="step2">
                    <h4>Étape 2 : Aspects Fonciers</h4>
                    <ul>
                        <li style="color: rgb(47, 15, 162);"> Origine du droit acquis</li>
                    </ul>

                    <div class="form-group">
                        <label for="superficie_mise_en_valeur">Superficie Mise en Valeur</label>
                        <input type="text" name="superficie_mise_en_valeur" id="superficie_mise_en_valeur" class="form-control" required>
                        @error('superficie_mise_en_valeur')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_de_mise_en_valeur">Date de Mise en Valeur</label>
                        <input type="date" name="date_de_mise_en_valeur" id="date_de_mise_en_valeur" class="form-control" required>
                        @error('date_de_mise_en_valeur')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Propriété du terrain -->
                    <div class="form-group">
                        <label for="propriete_terrain">Le terrain est-il propriete :</label>
                        <select name="propriete_terrain" id="propriete_terrain" class="form-control" required>
                            <option value="collective">Collective</option>
                            <option value="individuelle">Individuelle</option>
                        </select>
                        @error('propriete_terrain')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Mode d'acquisition (Cases à cocher) -->
                                <div class="form-group">
                                    <label for="mode_acquisition">Mode d'acquisition du droit :</label><br>
                                    <input type="checkbox" name="mode_acquisition[]" value="acheté" id="achete"> Acheté<br>
                                    <input type="checkbox" name="mode_acquisition[]" value="loué" id="loue"> Loué<br>
                                    <input type="checkbox" name="mode_acquisition[]" value="hérité" id="herite"> Hérité<br>
                                    <input type="checkbox" name="mode_acquisition[]" value="donné" id="donne"> Donné<br>
                                    <input type="checkbox" name="mode_acquisition[]" value="prêté" id="prete"> Prêté<br>
                                </div>

                                <!-- Détails de la location (Affiché si "Loué" est coché) -->
                                <div class="form-group" id="loueDetails" style="display: none;">
                                    <label for="loue_a_qui">Loué à qui :</label>
                                    <input type="text" name="loue_a_qui" class="form-control"><br>

                                    <label for="loue_quel_prix">À quel prix :</label>
                                    <input type="text" name="loue_quel_prix" class="form-control"><br>

                                    <label for="loue_pour_combien_de_temps">Pour combien de temps :</label>
                                    <input type="text" name="loue_pour_combien_de_temps" class="form-control"><br>

                                    <label for="loue_par_contrat">Par contrat :</label><br>
                                    <input type="radio" name="loue_par_contrat" value="écrit"> Écrit<br>
                                    <input type="radio" name="loue_par_contrat" value="informel"> Informel<br>
                                </div>

                                <!-- Détails du prêt (Affiché si "Prêté" est coché) -->
                                <div class="form-group" id="preteDetails" style="display: none;">
                                    <label for="prete_par_qui">Prêté par qui :</label>
                                    <input type="text" name="prete_par_qui" class="form-control"><br>

                                    <label for="prete_conditions">Conditions :</label>
                                    <textarea name="prete_conditions" class="form-control"></textarea><br>

                                    <label for="prete_pour_combien_de_temps">Pour combien de temps :</label>
                                    <input type="text" name="prete_pour_combien_de_temps" class="form-control"><br>

                                    <label for="prete_par_contrat">Par contrat :</label><br>
                                    <input type="radio" name="prete_par_contrat" value="écrit"> Écrit<br>
                                    <input type="radio" name="prete_par_contrat" value="informel"> Informel<br>
                                </div>

                                <!-- Autorisations diverses (Cases à cocher) -->
                                <div class="form-group">
                                    <label>Autorisations :</label><br>
                                    <input type="checkbox" name="peut_vendre_a_etrangers" value="oui"> Les membres de la coopératve peuvent-ils vendre leur parcelle à des étrangers<br>
                                    <input type="checkbox" name="peut_vendre_a_membres" value="oui"> Les membres de la coopératve peuvent-ils vendre leur parcelle à d’autres membres de la
                                    coopérative<br>
                                    <input type="checkbox" name="peut_preter_a_etrangers" value="oui"> Les membres de la coopératve peuvent-ils preter leur parcelle à des étrangers<br>
                                    <input type="checkbox" name="peut_louer_a_membres" value="oui"> Les membres de la coopératve peuvent-ils louer leur parcelle à d’autres membres de la
                                    coopérative<br>
                                </div>

                                <!-- Nombre d'étrangers cultivant et méthodes d'acquisition de droits -->
                                <div class="form-group">
                                    <label for="nombre_etrangers_cultivant">Combien d’étrangers à la collectivité cultivent le périmètre :</label>
                                    <input type="number" name="nombre_etrangers_cultivant" class="form-control"><br>

                                    <label>Ont-ils acquis des droits par :</label><br>
                                    <label for="etrangers_acquis_droit_par_achat">Achat :</label>
                                    <input type="radio" name="etrangers_acquis_droit_par_achat" value="oui"> Oui
                                    <input type="radio" name="etrangers_acquis_droit_par_achat" value="non"> Non<br>

                                    <label for="etrangers_acquis_droit_par_location">Location :</label>
                                    <input type="radio" name="etrangers_acquis_droit_par_location" value="oui"> Oui
                                    <input type="radio" name="etrangers_acquis_droit_par_location" value="non"> Non<br>
                                    <label for="etrangers_acquis_droit_par_heritage">Héritage :</label>
                                    <input type="radio" name="etrangers_acquis_droit_par_heritage" value="oui"> Oui
                                    <input type="radio" name="etrangers_acquis_droit_par_heritage" value="non"> Non<br>


                                    <label for="etrangers_acquis_droit_par_pret">Prêt :</label>
                                    <input type="radio" name="etrangers_acquis_droit_par_pret" value="oui"> Oui
                                    <input type="radio" name="etrangers_acquis_droit_par_pret" value="non"> Non<br>
                                </div>

                                <ul>
                                    <li style="color: rgb(47, 15, 162);"> Droit d’exploitation du périmètre</li>
                                </ul>

                                                <!-- Droit Exploitation (Cases à cocher) -->
                        <div class="form-group">
                            <label for="droit_exploitation_perimetre">Le périmètre est exploité en vert de :</label><br>
                            <input type="checkbox" name="droit_exploitation_perimetre[]" value="droit_coutumier_informel_de_la_collectivite" id="droit_coutumier_informel_de_la_collectivite"> Droit coutumier informel de la collectivite<br>
                            <input type="checkbox" name="droit_exploitation_perimetre[]" value="membre_de_la_collectivite" id="membre_de_la_collectivite"> Membre de la collectivite<br>
                            <input type="checkbox" name="droit_exploitation_perimetre[]" value="droit_concession_provisoire" id="droit_concession_provisoire"> Un droit résultant d’une concession provisoire accordée sur un terrain relevant préalablement du droit coutumier  ou du domaine privé de l’Etat<br>
                            <input type="checkbox" name="droit_exploitation_perimetre[]" value="domaine_privee_de_etat" id="domaine_privee_de_etat"> Domaine privee de l'etat<br>
                            <input type="checkbox" name="droit_exploitation_perimetre[]" value="droit_resultant_certificat_propriete_par_hakem_de" id="certificat_de_propriete_hakem"> Certificat de propriete - Hakem<br>
                            <input type="checkbox" name="droit_exploitation_perimetre[]" value="par_le wali_de" id="certificat_de_propriete_wali"> Certificat de propriete - Wali<br>
                            <input type="checkbox" name="droit_exploitation_perimetre[]" value="occupation_irreguliere_du_domaine_de_etat" id="occupation_irreguliere_du_domaine_de_etat"> Occupation irreguliere du domaine de l'etat<br>
                            <input type="checkbox" name="droit_exploitation_perimetre[]" value="domaine_des_particuliers_etat" id="domaine_des_particuliers_etat"> Domaine des particuliers de l'etat<br>
                        </div>
                        <!-- Détails de la certificat (Affiché si " certificat de propriete wali" est coché) -->
                        <div class="form-group" id="certificatwaliDetails" style="display: none;">
                            <label for="par_le wali_de">Par le wali de :</label>
                            <input type="text" name="par_le wali_de" class="form-control"><br>

                            <label for="titre_foncier">Titre foncier Numero :</label>
                            <input type="text" name="titre_foncier" class="form-control"><br>

                            <label for="date_du">Date :</label>
                            <input type="date" name="date_du" class="form-control"><br>

                            <label for="delivre_par">Delivre Par :</label>
                            <input type="text" name="delivre_par" class="form-control"><br>

                        </div>

                        <!-- Détails du certificat (Affiché si "Hakem" est coché) -->
                        <div class="form-group" id="certificathakemDetails" style="display: none;">
                            <label for="droit_resultant_certificat_propriete_par_hakem_de">Par hakem de :</label>
                            <input type="text" name="droit_resultant_certificat_propriete_par_hakem_de" class="form-control"><br>

                            <label for="titre_foncier">Titre foncier Numero :</label>
                            <input type="text" name="titre_foncier" class="form-control"><br>

                            <label for="date_du">Date :</label>
                            <input type="date" name="date_du" class="form-control"><br>

                            <label for="delivre_par">Delivre Par :</label>
                            <input type="text" name="delivre_par" class="form-control"><br>
                        </div>

                        <ul>
                            <li style="color: rgb(47, 15, 162);"> Stade du processus de régularisatin de l’occupation :</li>
                        </ul>

                        <div class="form-group">
                            <label for="stade_du_processus_reg_occupation">Stade du processus de régularisation de l’occupation : </label><br>
                            <input type="checkbox" name="stade_du_processus_reg_occupation[]" value="demande_non_encore_adressee" id="demande_non_encore_adressee"> Demande non encore adressée aux autorités administratives <br>
                            <input type="checkbox" name="stade_du_processus_reg_occupation[]" value="demande_adressee_mais_sans_reponse" id="demande_adressee_mais_sans_reponse"> Demande adressée aux autorités administratives mais sans réponse<br>
                            <input type="checkbox" name="stade_du_processus_reg_occupation[]" value="debut_de_processus" id="debut_de_processus"> debut de processus<br>
                        </div>
                        <div class="form-group">
                            <label for="demande_examinee_par_commission_moughataa_de">demande examinée par la commission de moughataa de :</label>
                            <input type="text" name="demande_examinee_par_commission_moughataa_de" class="form-control" id="demande_examinee_par_commission_moughataa_de" >
                        </div>

                </div>

        <div class="step d-none" id="step3">


            <h4>Étape 3 : ASPECTS ÉCONOMIQUES ET SOCIAUX</h4>
            <ul>
                <li style="color: rgb(47, 15, 162);"> Responsabilité de la distribution des parcelles</li>
            </ul>
                <!-- Responsabilité de la distribution des parcelles -->
                            <div class="form-group">
                                <label>Responsabilité de la distribution des parcelles :</label> <br>
                                <input type="checkbox" name="organe_de_gestion" value="1"> Organe de gestion <br>
                                <input type="checkbox" name="djamaa" value="1"> Djamaa <br>
                                <input type="checkbox" name="chef_village" value="1"> Chef du village <br>
                            </div>
                                <!-- Droit de propriété pour les femmes -->
                                <label>Les femmes ont le droit de propriété à la distribution initiale du partage des parcelle par :</label> <br>
                                <input type="checkbox" name="par_rachat" value="1"> Par rachat <br>
                                <input type="checkbox" name="par_voie_heritage" value="1"> Par voie d’héritage <br>

                                <!-- Droit de propriété pour les femmes -->

                                <label>Payent elles ? :</label> <br>
                                <input type="checkbox" name="payent_elles_nature" value="1"> Payent elles en nature <br>
                                <input type="checkbox" name="payent_elles_espece" value="1"> Payent elles en espece <br>
                                <input type="checkbox" name="payent_elles_un_loyer" value="1"> Payent elles un loyer<br>
                                <input type="checkbox" name="payent_elles_un_rempechen" value="1"> Payent elles un rempechen <br>
                                <input type="checkbox" name="payent_elles_assakal" value="1"> Payent elles un assakal <br>



                                <!-- Nombre de femmes exploitantes -->
                                <div class="form-group">
                                <label for="nombre_femmes_exploitantes">Quel est le nombre des femmes exploitantes :</label> <br>
                                <input type="number" class="form-control" id="nombre_femmes_exploitantes" name="nombre_femmes_exploitantes"> <br>
                                </div>



                                <!-- Spéculations pratiquées -->
                                <div class="form-group">
                                <label>Spéculations pratiquées :</label> <br>
                                <input type="text" name="speculations_pratiquees" class="form-control" id="speculations_pratiquees">
                                </div>

                                <!-- Rendement par spéculation -->
                                <div class="form-group">
                                <label>Rendement par spéculation à l’hectare :</label> <br>
                                <input type="text" class="form-control" name="rendement_par_spec_a_hectare" id="rendement_par_spec_a_hectare"><br>
                                </div>
                                <!-- La variété de semences -->
                                <div class="form-group">
                                <label for="variete_de_semences">La variété de semences :</label> <br>
                                <input class="form-control" type="text" name="variete_de_semences" id="La variété de semences" > <br>
                                </div>
                                <!-- cycle_speculations -->
                                <div>
                                <label for="cycle_speculations">Cycle de speculations</label><br>
                                <input type="text" name="cycle_speculations" id="cycle_speculations" class="form-control">
                                </div>
                                <!-- Crédit de l'État -->
                                <div class="form-group">
                                <label>Avez-vous bénéficié d’un crédit de l'État ou de ses institutions spécialisées ?</label><br>
                                <input type="radio" name="benefi_credit_etat_institutions_specialisees" value="oui"> Oui <br>
                                <input type="radio" name="benefi_credit_etat_institutions_specialisees" value="non"> Non <br>
                                </div>
                                <!-- Crédit auprès d’une banque privée -->
                                <div class="form-group">
                                <label>Avez-vous contracté un crédit auprès d’une banque privée ?</label> <br>
                                <input type="radio" name="contracte_credit_banque_privee" value="oui"> Oui <br>
                                <input type="radio" name="contracte_credit_banque_privee" value="non"> Non <br>
                                </div>

                                <div class="form-group">
                                    <label>Avez-vous déjà demandé un crédit auprès d’une banque privée ?</label> <br>
                                    <input type="radio" name="demande_credit_banque_privee" value="oui" onclick="togglePourquoi(false)"> Oui <br>
                                    <input type="radio" name="demande_credit_banque_privee" value="non" id="pourquoi" onclick="togglePourquoi(true)"> Non <br>
                                </div>

                                <!-- Détails de crédit demandé auprès d'une banque privée (Affiché si "Non" est coché) -->
                                <div class="form-group" id="pourquoiDetails" style="display: none;">
                                    <label for="pourquoi">Pourquoi :</label> <br>
                                    <input type="text" name="pourquoi" class="form-control"><br>
                                </div>
        </div>

          <div class="step d-none" id="step4">
            <h4>Étape 4 : Difficultés rencontrées</h4>

                    <!-- Difficultés rencontrées -->
                <div class="form-group">
                    <label>Difficultés rencontrées :</label> <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="stockage"> Problème de stockage <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="formation"> Formation <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="commercialisation"> Commercialisation <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="financier"> Financier <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="approvisionnement"> Approvisionnement en eau <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="encadrement"> Encadrement technique <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="machine"> Problème de machine <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="cloture"> Problème de clôture <br>
                    <input type="checkbox" name="difficultes_rencontrees[]" value="canalisation"> Problème de canalisation <br>
                </div>
                    <!-- Autres problèmes -->
                    <div class="form-group">
                    <label for="autres_problemes">Autres problèmes :</label> <br>
                    <input type="text" class="form-control" id="autres_problemes" name="autres_problemes">
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


@endsection
