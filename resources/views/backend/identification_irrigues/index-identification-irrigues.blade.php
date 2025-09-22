@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Liste des perimetres Irriguées</h3>
                                <div class="btn-group">
                                    <a href="{{ route('identification_irrigues.create') }}" class="btn btn-primary">Remplir nouveau fiche </a>
                                    <a href="{{ url('export_irrigue') }}" class="btn btn-success">Exporter Excel</a>
                                    <a href="{{ route('identification_irrigues.export.pdf') }}" class="btn btn-danger">Exporter PDF</a>
                                    <button class="btn btn-info" onclick="printTable()">Imprimer Tout</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <form method="GET" action="{{ route('identification_irrigues.index') }}" class="mb-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, date, etc." value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="identificationsTable">
                                <thead>
                                    <tr>
                                        <th>Wilaya</th>
                                        <th>Moughataa</th>
                                        <th>Commune</th>
                                        <th>Périmètre</th>
                                        <th>Localité</th>
                                        <th>Date d'Aménagement</th>
                                        <th>Superficie Mise en Valeur</th>
                                        <th>Détails</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($identifications as $identification)
                                        <tr id="row{{ $identification->id }}">
                                            <td>{{ $identification->wilaya->nom_du_wilaya }}</td>
                                            <td>{{ $identification->moughataa->nom_du_moughataa }}</td>
                                            <td>{{ $identification->commune->nom_du_commune }}</td>
                                            <td>{{ $identification->perimetre->nom_du_perimetre }}</td>
                                            <td>{{ $identification->localite->nom_du_localite }}</td>
                                            <td>{{ $identification->date_amenagement }}</td>
                                            <td>{{ $identification->superficie_mise_en_valeur }}</td>
                                            <td>
                                                <button class="btn btn-primary  btn-sm" data-toggle="collapse" data-target="#details{{ $identification->id }}">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
                                            <td style="width: 5cm;">
                                                <a href="{{ route('identification_irrigues.edit', $identification->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a class="btn btn-info btn-sm" href="{{ url('print_irrigue/' . $identification->id) }}">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                                <form action="{{ route('identification_irrigues.destroy', $identification->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr id="details{{ $identification->id }}" class="collapse">
                                            <td colspan="10">
                                                <strong>Vocation du Périmètre:</strong>
                                                {{ is_array($identification->vocation_du_perimetre) ? implode(', ', $identification->vocation_du_perimetre) : $identification->vocation_du_perimetre ?? 'Non spécifié' }}
                                                <br>
                                                <strong>Nature de l'Organisation:</strong>
                                                {{ is_array($identification->nature_de_l_organisation) ? implode(', ', $identification->nature_de_l_organisation) : $identification->nature_de_l_organisation ?? 'Non spécifié' }}<br>
                                                <strong>Nombre d'Adhérents:</strong> {{ $identification->nombre_adherents ?? 0 }}<br>
                                                <strong>Nombre d'Hommes:</strong> {{ $identification->nombre_homme ?? 0 }}<br>
                                                <strong>Nombre de Femmes:</strong> {{ $identification->nombre_femme ?? 0 }}<br>
                                                <strong>Date de Régularisation:</strong> {{ $identification->date_regul_stru_exploitant ?? 'Non spécifié' }}<br>
                                                <strong>Date d'enquete:</strong> {{ $identification->date_denquete ?? 'Non spécifié' }}<br>
                                                <strong>Numéro de Récépissé:</strong> {{ $identification->recepisse_reconnaissance ?? 'Non spécifié' }}<br>
                                                <strong>Nom du Dirigeant:</strong> {{ $identification->nom_du_dirigeant_strc_exploitant ?? 'Non spécifié' }}<br>
                                                <strong>Téléphone:</strong> {{ $identification->telephone ?? 'Non spécifié' }}<br>
                                                <strong>Propriété Terrain:</strong> {{ $identification->propriete_terrain ?? 'Non spécifié' }}<br>
                                                <strong>Mode Acquisition:</strong> {{ is_array($identification->mode_acquisition) ? implode(', ', $identification->mode_acquisition) : $identification->mode_acquisition ?? 'Non spécifié' }}<br>
                                                <strong>Loué à Qui:</strong> {{ $identification->loue_a_qui ?? 'Non spécifié' }}<br>
                                                <strong>Loué Quel Prix:</strong> {{ $identification->loue_quel_prix ?? 'Non spécifié' }}<br>
                                                <strong>Loué Pour Combien de Temps:</strong> {{ $identification->loue_pour_combien_de_temps ?? 'Non spécifié' }}<br>
                                                <strong>Loué par Contrat:</strong> {{ $identification->loue_par_contrat ?? 'Non spécifié' }}<br>
                                                <strong>Prêté par Qui:</strong> {{ $identification->prete_par_qui ?? 'Non spécifié' }}<br>
                                                <strong>Conditions de Prêt:</strong> {{ $identification->prete_conditions ?? 'Non spécifié' }}<br>
                                                <strong>Prêté Pour Combien de Temps:</strong> {{ $identification->prete_pour_combien_de_temps ?? 'Non spécifié' }}<br>
                                                <strong>Prêté par Contrat:</strong> {{ $identification->prete_par_contrat ?? 'Non spécifié' }}<br>
                                                <strong>Peut Vendre à Étrangers:</strong> {{ $identification->peut_vendre_a_etrangers ?? 'Non spécifié' }}<br>
                                                <strong>Peut Vendre à Membres:</strong> {{ $identification->peut_vendre_a_membres ?? 'Non spécifié' }}<br>
                                                <strong>Peut Prêter à Étrangers:</strong> {{ $identification->peut_preter_a_etrangers ?? 'Non spécifié' }}<br>
                                                <strong>Peut Louer à Membres:</strong> {{ $identification->peut_louer_a_membres ?? 'Non spécifié' }}<br>
                                                <strong>Nombre d'Étrangers Cultivant:</strong> {{ $identification->nombre_etrangers_cultivant ?? 0 }}<br>
                                                <strong>Étrangers Acquis Droit par Achat:</strong> {{ $identification->etrangers_acquis_droit_par_achat ?? 'Non spécifié' }}<br>
                                                <strong>Étrangers Acquis Droit par Prêt:</strong> {{ $identification->etrangers_acquis_droit_par_pret ?? 'Non spécifié' }}<br>
                                                <strong>Étrangers Acquis Droit par Location:</strong> {{ $identification->etrangers_acquis_droit_par_location ?? 'Non spécifié' }}<br>
                                                <strong>Étrangers Acquis Droit par Héritage:</strong> {{ $identification->etrangers_acquis_droit_par_heritage ?? 'Non spécifié' }}<br>
                                                <strong>Droit d'exploitation du périmètre:</strong> {{ is_array($identification->droit_exploitation_perimetre) ? implode(', ', $identification->droit_exploitation_perimetre) : $identification->droit_exploitation_perimetre ?? 'Non spécifié' }}<br>
                                                <strong>Un droit coutumier informel  de la collectivité :</strong> {{ $identification->droit_coutumier_informel_de_la_collectivite ?? 'Non spécifié' }}<br>
                                                <strong>Un Membre de la collectivité :</strong> {{ $identification->membre_de_la_collectivite ?? 'Non spécifié' }}<br>
                                                <strong>Un droit résultant d'une concession provisoire accordée sur un terrain relevant préalablement du droit coutumier :</strong> {{ $identification->droit_concession_provisoire ?? 'Non spécifié' }}<br>
                                                <strong>Domaine privee de l'etat :</strong> {{ $identification->domaine_privee_de_etat ?? 'Non spécifié' }}<br>
                                                <strong>Un droit résultant d'un Certificat de propriété coutumière délivré par le Hakem de :</strong> {{ $identification->droit_resultant_certificat_propriete_par_hakem_de?? 'Non spécifié' }}<br>
                                                <strong>Un droit résultant d'un Certificat de propriété coutumière délivré par le Wali de :</strong> {{ $identification->par_le_wali_de ?? 'Non spécifié' }}<br>
                                                <strong>Occupation irrégulière du domaine de l'Etat:</strong> {{ $identification->occupation_irreguliere_du_domaine_de_etat ?? 'Non spécifié' }}<br>
                                                <strong>Du domaine des particuliers Etat   :</strong> {{ $identification->domaine_des_particuliers_etat ?? 'Non spécifié' }}<br>
                                                <strong>Stade du processus de régularisation de l'occupation :</strong> {{ is_array($identification->stade_du_processus_reg_occupation) ? implode(', ', $identification->stade_du_processus_reg_occupation) : $identification->stade_du_processus_reg_occupation ?? 'Non spécifié' }}<br>
                                                <strong>Demande non encore adressée aux autorités administratives :</strong> {{ $identification->demande_non_encore_adressee ?? 'Non spécifié' }}<br>
                                                <strong>Demande adressée aux autorités administratives mais sans réponse :</strong> {{ $identification->demande_adressee_mais_sans_reponse ?? 'Non spécifié' }}<br>
                                                <strong>Debut de processus :</strong> {{ $identification->debut_de_processus ?? 'Non spécifié' }}<br>
                                                <strong>Demande examinée par la commission de moughataa de :</strong> {{ $identification->demande_examinee_par_commission_moughataa_de ?? 'Non spécifié' }}<br>
                                                <strong>Aspects économiques et sociaux :</strong> {{ json_encode($identification->aspects_eco_sociaux) ?? 'Non spécifié' }}<br>
                                                <strong>Organe de gestion :</strong> {{ $identification->organe_de_gestion ?? 'Non spécifié' }}<br>
                                                <strong>Djamaa :</strong> {{ $identification->djamaa ?? 'Non spécifié' }}<br>
                                                <strong>Chef du village :</strong> {{ $identification->chef_village ?? 'Non spécifié' }}<br>
                                                <strong>Rachat :</strong> {{ $identification->par_rachat ?? 'Non spécifié' }}<br>
                                                <strong>Voie d'héritage :</strong> {{ $identification->par_voie_heritage ?? 'Non spécifié' }}<br>
                                                <strong>Nombre de femmes exploitantes :</strong> {{ $identification->nombre_femmes_exploitantes ?? 'Non spécifié' }}<br>
                                                <strong>Paiements en nature :</strong> {{ $identification->payent_elles_nature ?? 'Non spécifié' }}<br>
                                                <strong>Paiements en espèces :</strong> {{ $identification->payent_elles_espece ?? 'Non spécifié' }}<br>
                                                <strong>Paiements de loyer :</strong> {{ $identification->payent_elles_un_loyer ?? 'Non spécifié' }}<br>
                                                <strong>Paiements de rempechen :</strong> {{ $identification->payent_elles_un_rempechen ?? 'Non spécifié' }}<br>
                                                <strong>Paiements d'assakal :</strong> {{ $identification->payent_elles_assakal ?? 'Non spécifié' }}<br>
                                                <strong>Spéculations pratiquées :</strong> {{ $identification->speculations_pratiquees ?? 'Non spécifié' }}<br>
                                                <strong>Rendement par spéculation à l'hectare :</strong> {{ $identification->rendement_par_spec_a_hectare ?? 'Non spécifié' }}<br>
                                                <strong>Variété de semences :</strong> {{ $identification->variete_de_semences ?? 'Non spécifié' }}<br>
                                                <strong>Cycle des spéculations :</strong> {{ $identification->cycle_speculations ?? 'Non spécifié' }}<br>
                                                <strong>Bénéfice de crédit d'état ou d'institutions spécialisées :</strong> {{ $identification->benefi_credit_etat_institutions_specialisees ?? 'Non spécifié' }}<br>
                                                <strong>Crédit contracté auprès d'une banque privée :</strong> {{ $identification->contracte_credit_banque_privee ?? 'Non spécifié' }}<br>
                                                <strong>Demande de crédit auprès d'une banque privée :</strong> {{ $identification->demande_credit_banque_privee ?? 'Non spécifié' }}<br>
                                                <strong>Pourquoi :</strong> {{ $identification->pourquoi ?? 'Non spécifié' }}<br>
                                                <strong>Difficultés rencontrées :</strong> {{ json_encode($identification->difficultes_rencontrees) ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de stockage :</strong> {{ $identification->problemes_stockage ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de formation :</strong> {{ $identification->problemes_formation ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de commercialisation :</strong> {{ $identification->problemes_commercialisation ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes financiers :</strong> {{ $identification->problemes_financier ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes d'approvisionnement en eau :</strong> {{ $identification->problemes_approvisionnement_en_eau ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes d'encadrement technique :</strong> {{ $identification->problemes_encadrement_technique ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de machine :</strong> {{ $identification->probleme_de_machine ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de clôture :</strong> {{ $identification->probleme_de_cloture ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de canalisation :</strong> {{ $identification->probleme_de_canalisation ?? 'Non spécifié' }}<br>
                                                <strong>Autres problèmes :</strong> {{ $identification->autres_problemes ?? 'Non spécifié' }}<br>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $identifications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function printTable() {
        var printWindow = window.open('', '', 'height=500,width=800');
        printWindow.document.write('<html><head><title>Impression</title>');
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; margin: 20px; } .identification { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; } </style>');
        printWindow.document.write('</head><body>');

        // Ajout du logo et des couleurs
        printWindow.document.write('<img src="{{ asset('template/images/GEREMELOGO.png') }}" alt="Logo" style="width: 150px; margin-bottom: 20px;">');
        printWindow.document.write('<h1 style="text-align: center;">Liste des Identifications Irriguées</h1>');

        // Liste complète des champs à afficher (inclure tous les champs nécessaires)
        var fieldNames = [
            'Wilaya', 'Moughataa', 'Commune', 'Périmètre', 'Localité', 'Date d\'Aménagement', 'Superficie Mise en Valeur',
            'Vocation du Périmètre', 'Nature de l\'Organisation', 'Nombre d\'Adhérents', 'Nombre d\'Hommes', 'Nombre de Femmes',
            'Date de Régularisation', 'Date d\'enquete', 'Numéro de Récépissé', 'Nom du Dirigeant', 'Téléphone', 'Propriété Terrain', 'Mode Acquisition',
            'Loué à Qui', 'Loué Quel Prix', 'Loué Pour Combien de Temps', 'Loué par Contrat', 'Prêté par Qui', 'Conditions de Prêt',
            'Prêté Pour Combien de Temps', 'Prêté par Contrat', 'Peut Vendre à Étrangers', 'Peut Vendre à Membres', 'Peut Prêter à Étrangers',
            'Peut Louer à Membres', 'Nombre d\'Étrangers Cultivant', 'Étrangers Acquis Droit par Achat', 'Étrangers Acquis Droit par Prêt',
            'Étrangers Acquis Droit par Location', 'Étrangers Acquis Droit par Héritage', 'Droit d\'exploitation du périmètre',
            'Un droit coutumier informel  de la collectivité', 'Un Membre de la collectivité', 'Un droit résultant d\'une concession provisoire accordée sur un terrain relevant préalablement du droit coutumier',
            'Domaine privee de l\'etat', 'Un droit résultant d\'un Certificat de propriété coutumière délivré par le Hakem de', 'Un droit résultant d\'un Certificat de propriété coutumière délivré par le Wali de',
            'Occupation irrégulière du domaine de l\'Etat', 'Du domaine des particuliers Etat', 'Stade du processus de régularisation de l\'occupation',
            'Demande non encore adressée aux autorités administratives', 'Demande adressée aux autorités administratives mais sans réponse', 'Debut de processus',
            'Demande examinée par la commission de moughataa de',   'Aspects éco-sociaux', 'Organe de gestion', 'Djamaa', 'Chef du village', 'Par rachat', 'Par voie d\'héritage',
            'Femme dirigeante', 'Nombre de femmes exploitantes', 'Payent-elles en nature ?', 'Payent-elles en espèces ?', 'Payent-elles un loyer ?',
            'Payent-elles un rempechen ?', 'Payent-elles un assakal ?', 'Spéculations pratiquées', 'Rendement par spéculation à l\'hectare',
            'Variété de semences', 'Cycle des spéculations', 'Crédit obtenu auprès de l\'Etat ou d\'institutions spécialisées',
            'Crédit contracté auprès de banques privées', 'Demande de crédit auprès de banques privées', 'Pourquoi', 'Difficultés rencontrées',
            'Problèmes de stockage', 'Problèmes de formation', 'Problèmes de commercialisation', 'Problèmes financiers', 'Problèmes d\'approvisionnement en eau',
            'Problèmes d\'encadrement technique', 'Problème de machines', 'Problème de clôture', 'Problème de canalisation', 'Autres problèmes'

        ];

        // Récupère toutes les lignes
        var rows = document.querySelectorAll('#identificationsTable tbody tr');
        rows.forEach(function(row) {
            var id = row.id.replace('row', ''); // Extraire l'ID de la ligne
            var detailRow = document.querySelector('#details' + id); // Sélectionner la ligne de détails correspondante

            printWindow.document.write('<div class="identification">');
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
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; margin: 20px; } .identification { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; } </style>');
        printWindow.document.write('</head><body>');

        // Ajout du logo et des couleurs
        printWindow.document.write('<img src="{{ asset('template/images/GEREMELOGO.png') }}" alt="Logo" style="width: 150px; margin-bottom: 20px;">');
        printWindow.document.write('<h1 style="text-align: center;">Détails de l\'Identification Irriguée</h1>');

        // Noms des champs à afficher
        var fieldNames = [
            'Wilaya', 'Moughataa', 'Commune', 'Périmètre', 'Localité', 'Date d\'Aménagement', 'Superficie Mise en Valeur',
            'Vocation du Périmètre', 'Nature de l\'Organisation', 'Nombre d\'Adhérents', 'Nombre d\'Hommes', 'Nombre de Femmes',
            'Date de Régularisation', 'Date d\'enquete', 'Numéro de Récépissé', 'Nom du Dirigeant', 'Téléphone', 'Propriété Terrain', 'Mode Acquisition',
            'Loué à Qui', 'Loué Quel Prix', 'Loué Pour Combien de Temps', 'Loué par Contrat', 'Prêté par Qui', 'Conditions de Prêt',
            'Prêté Pour Combien de Temps', 'Prêté par Contrat', 'Peut Vendre à Étrangers', 'Peut Vendre à Membres', 'Peut Prêter à Étrangers',
            'Peut Louer à Membres', 'Nombre d\'Étrangers Cultivant', 'Étrangers Acquis Droit par Achat', 'Étrangers Acquis Droit par Prêt',
            'Étrangers Acquis Droit par Location', 'Étrangers Acquis Droit par Héritage', 'Droit d\'exploitation du périmètre',
            'Un droit coutumier informel  de la collectivité', 'Un Membre de la collectivité', 'Un droit résultant d\'une concession provisoire accordée sur un terrain relevant préalablement du droit coutumier',
            'Domaine privee de l\'etat', 'Un droit résultant d\'un Certificat de propriété coutumière délivré par le Hakem de', 'Un droit résultant d\'un Certificat de propriété coutumière délivré par le Wali de',
            'Occupation irrégulière du domaine de l\'Etat', 'Du domaine des particuliers Etat', 'Stade du processus de régularisation de l\'occupation',
            'Demande non encore adressée aux autorités administratives', 'Demande adressée aux autorités administratives mais sans réponse', 'Debut de processus',
            'Demande examinée par la commission de moughataa de',  'Aspects éco-sociaux', 'Organe de gestion', 'Djamaa', 'Chef du village', 'Par rachat', 'Par voie d\'héritage',
            'Femme dirigeante', 'Nombre de femmes exploitantes', 'Payent-elles en nature ?', 'Payent-elles en espèces ?', 'Payent-elles un loyer ?',
            'Payent-elles un rempechen ?', 'Payent-elles un assakal ?', 'Spéculations pratiquées', 'Rendement par spéculation à l\'hectare',
            'Variété de semences', 'Cycle des spéculations', 'Crédit obtenu auprès de l\'Etat ou d\'institutions spécialisées',
            'Crédit contracté auprès de banques privées', 'Demande de crédit auprès de banques privées', 'Pourquoi', 'Difficultés rencontrées',
            'Problèmes de stockage', 'Problèmes de formation', 'Problèmes de commercialisation', 'Problèmes financiers', 'Problèmes d\'approvisionnement en eau',
            'Problèmes d\'encadrement technique', 'Problème de machines', 'Problème de clôture', 'Problème de canalisation', 'Autres problèmes'
        ];

        // Récupère les cellules de la ligne sélectionnée
        var cells = document.querySelectorAll('#row' + id + ' td');
        var detailRow = document.querySelector('#details' + id); // Sélectionner la ligne de détails correspondante

        printWindow.document.write('<div class="identification">');
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
</script>

@endsection
