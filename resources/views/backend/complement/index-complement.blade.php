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
                                <h3 class="card-title">Liste des champs irrigues en complement</h3>
                                <div class="btn-group">
                                    <a href="{{ route('complement.create') }}" class="btn btn-primary">Ajouter un fiche d'enquete du champs irrigues en complement</a>
                                    <a href="{{ url('export_complement') }}" class="btn btn-success">Exporter Excel</a>
                                    <a href="{{ route('complement.export.pdf') }}" class="btn btn-danger">Exporter PDF</a>
                                    <button class="btn btn-info" onclick="printTable()">Imprimer Tout</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <form method="GET" action="{{ route('complement.index') }}" class="mb-3">
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
                            <table class="table table-bordered table-striped" id="complementsTable">
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
                                    @foreach($complements as $complement)
                                        <tr id="row{{ $complement->id }}">
                                            <td>{{ $complement->wilaya->nom_du_wilaya }}</td>
                                            <td>{{ $complement->moughataa->nom_du_moughataa }}</td>
                                            <td>{{ $complement->commune->nom_du_commune }}</td>
                                            <td>{{ $complement->perimetre->nom_du_perimetre }}</td>
                                            <td>{{ $complement->localite->nom_du_localite }}</td>
                                            <td>{{ $complement->date_amenagement }}</td>
                                            <td>{{ $complement->superficie_mise_en_valeur }}</td>
                                            <td>

                                                <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#details{{ $complement->id }}">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>

                                            </td>
                                            <td style="width: 5cm;">
                                                <a href="{{ route('complement.edit', $complement->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a class="btn btn-info btn-sm" href="{{ url('print_irrigue/' . $complement->id) }}">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                                <form action="{{ route('complement.destroy', $complement->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr id="details{{ $complement->id }}" class="collapse">
                                            <td colspan="10">
                                                <strong>Vocation du Périmètre:</strong>
                                                {{ is_array($complement->vocation_du_perimetre) ? implode(', ', $complement->vocation_du_perimetre) : $complement->vocation_du_perimetre ?? 'Non spécifié' }}
                                                <br>
                                                <strong>Nature de l'Organisation:</strong>
                                                {{ is_array($complement->nature_de_l_organisation) ? implode(', ', $complement->nature_de_l_organisation) : $complement->nature_de_l_organisation ?? 'Non spécifié' }}<br>
                                                <strong>Nombre d'Adhérents:</strong> {{ $complement->nombre_adherents ?? 0 }}<br>
                                                <strong>Nombre d'Hommes:</strong> {{ $complement->nombre_homme ?? 0 }}<br>
                                                <strong>Nombre de Femmes:</strong> {{ $complement->nombre_femme ?? 0 }}<br>
                                                <strong>Date de Régularisation:</strong> {{ $complement->date_regul_stru_exploitant ?? 'Non spécifié' }}<br>
                                                <strong>Numéro de Récépissé:</strong> {{ $complement->recepisse_reconnaissance ?? 'Non spécifié' }}<br>
                                                <strong>Nom du Dirigeant:</strong> {{ $complement->nom_du_dirigeant_strc_exploitant ?? 'Non spécifié' }}<br>
                                                <strong>Téléphone:</strong> {{ $complement->telephone ?? 'Non spécifié' }}<br>
                                                <strong>Propriété Terrain:</strong> {{ $complement->propriete_terrain ?? 'Non spécifié' }}<br>
                                                <strong>Mode Acquisition:</strong> {{ is_array($complement->mode_acquisition) ? implode(', ', $complement->mode_acquisition) : $complement->mode_acquisition ?? 'Non spécifié' }}<br>
                                                <strong>Loué à Qui:</strong> {{ $complement->loue_a_qui ?? 'Non spécifié' }}<br>
                                                <strong>Loué Quel Prix:</strong> {{ $complement->loue_quel_prix ?? 'Non spécifié' }}<br>
                                                <strong>Loué Pour Combien de Temps:</strong> {{ $complement->loue_pour_combien_de_temps ?? 'Non spécifié' }}<br>
                                                <strong>Loué par Contrat:</strong> {{ $complement->loue_par_contrat ?? 'Non spécifié' }}<br>
                                                <strong>Prêté par Qui:</strong> {{ $complement->prete_par_qui ?? 'Non spécifié' }}<br>
                                                <strong>Conditions de Prêt:</strong> {{ $complement->prete_conditions ?? 'Non spécifié' }}<br>
                                                <strong>Prêté Pour Combien de Temps:</strong> {{ $complement->prete_pour_combien_de_temps ?? 'Non spécifié' }}<br>
                                                <strong>Prêté par Contrat:</strong> {{ $complement->prete_par_contrat ?? 'Non spécifié' }}<br>
                                                <strong>Peut Vendre à Étrangers:</strong> {{ $complement->peut_vendre_a_etrangers ?? 'Non spécifié' }}<br>
                                                <strong>Peut Vendre à Membres:</strong> {{ $complement->peut_vendre_a_membres ?? 'Non spécifié' }}<br>
                                                <strong>Peut Prêter à Étrangers:</strong> {{ $complement->peut_preter_a_etrangers ?? 'Non spécifié' }}<br>
                                                <strong>Peut Louer à Membres:</strong> {{ $complement->peut_louer_a_membres ?? 'Non spécifié' }}<br>
                                                <strong>Nombre d'Étrangers Cultivant:</strong> {{ $complement->nombre_etrangers_cultivant ?? 0 }}<br>
                                                <strong>Étrangers Acquis Droit par Achat:</strong> {{ $complement->etrangers_acquis_droit_par_achat ?? 'Non spécifié' }}<br>
                                                <strong>Étrangers Acquis Droit par Prêt:</strong> {{ $complement->etrangers_acquis_droit_par_pret ?? 'Non spécifié' }}<br>
                                                <strong>Étrangers Acquis Droit par Location:</strong> {{ $complement->etrangers_acquis_droit_par_location ?? 'Non spécifié' }}<br>
                                                <strong>Étrangers Acquis Droit par Héritage:</strong> {{ $complement->etrangers_acquis_droit_par_heritage ?? 'Non spécifié' }}<br>
                                                <strong>Droit d'exploitation du périmètre:</strong> {{ is_array($complement->droit_exploitation_perimetre) ? implode(', ', $complement->droit_exploitation_perimetre) : $complement->droit_exploitation_perimetre ?? 'Non spécifié' }}<br>
                                                <strong>Un droit coutumier informel  de la collectivité :</strong> {{ $complement->droit_coutumier_informel_de_la_collectivite ?? 'Non spécifié' }}<br>
                                                <strong>Un Membre de la collectivité :</strong> {{ $complement->membre_de_la_collectivite ?? 'Non spécifié' }}<br>
                                                <strong>Un droit résultant d'une concession provisoire accordée sur un terrain relevant préalablement du droit coutumier :</strong> {{ $complement->droit_concession_provisoire ?? 'Non spécifié' }}<br>
                                                <strong>Domaine privee de l'etat :</strong> {{ $complement->domaine_privee_de_etat ?? 'Non spécifié' }}<br>
                                                <strong>Un droit résultant d'un Certificat de propriété coutumière délivré par le Hakem de :</strong> {{ $complement->droit_resultant_certificat_propriete_par_hakem_de?? 'Non spécifié' }}<br>
                                                <strong>Un droit résultant d'un Certificat de propriété coutumière délivré par le Wali de :</strong> {{ $complement->par_le_wali_de ?? 'Non spécifié' }}<br>
                                                <strong>Occupation irrégulière du domaine de l'Etat:</strong> {{ $complement->occupation_irreguliere_du_domaine_de_etat ?? 'Non spécifié' }}<br>
                                                <strong>Du domaine des particuliers Etat   :</strong> {{ $complement->domaine_des_particuliers_etat ?? 'Non spécifié' }}<br>
                                                <strong>Stade du processus de régularisation de l'occupation :</strong> {{ is_array($complement->stade_du_processus_reg_occupation) ? implode(', ', $complement->stade_du_processus_reg_occupation) : $complement->stade_du_processus_reg_occupation ?? 'Non spécifié' }}<br>
                                                <strong>Demande non encore adressée aux autorités administratives :</strong> {{ $complement->demande_non_encore_adressee ?? 'Non spécifié' }}<br>
                                                <strong>Demande adressée aux autorités administratives mais sans réponse :</strong> {{ $complement->demande_adressee_mais_sans_reponse ?? 'Non spécifié' }}<br>
                                                <strong>Debut de processus :</strong> {{ $complement->debut_de_processus ?? 'Non spécifié' }}<br>
                                                <strong>Demande examinée par la commission de moughataa de :</strong> {{ $complement->demande_examinee_par_commission_moughataa_de ?? 'Non spécifié' }}<br>
                                                <strong>Aspects économiques et sociaux :</strong> {{ json_encode($complement->aspects_eco_sociaux) ?? 'Non spécifié' }}<br>
                                                <strong>Organe de gestion :</strong> {{ $complement->organe_de_gestion ?? 'Non spécifié' }}<br>
                                                <strong>Djamaa :</strong> {{ $complement->djamaa ?? 'Non spécifié' }}<br>
                                                <strong>Chef du village :</strong> {{ $complement->chef_village ?? 'Non spécifié' }}<br>
                                                <strong>Rachat :</strong> {{ $complement->par_rachat ?? 'Non spécifié' }}<br>
                                                <strong>Voie d'héritage :</strong> {{ $complement->par_voie_heritage ?? 'Non spécifié' }}<br>
                                                <strong>Nombre de femmes exploitantes :</strong> {{ $complement->nombre_femmes_exploitantes ?? 'Non spécifié' }}<br>
                                                <strong>Paiements en nature :</strong> {{ $complement->payent_elles_nature ?? 'Non spécifié' }}<br>
                                                <strong>Paiements en espèces :</strong> {{ $complement->payent_elles_espece ?? 'Non spécifié' }}<br>
                                                <strong>Paiements de loyer :</strong> {{ $complement->payent_elles_un_loyer ?? 'Non spécifié' }}<br>
                                                <strong>Paiements de rempechen :</strong> {{ $complement->payent_elles_un_rempechen ?? 'Non spécifié' }}<br>
                                                <strong>Paiements d'assakal :</strong> {{ $complement->payent_elles_assakal ?? 'Non spécifié' }}<br>
                                                <strong>Spéculations pratiquées :</strong> {{ $complement->speculations_pratiquees ?? 'Non spécifié' }}<br>
                                                <strong>Rendement par spéculation à l'hectare :</strong> {{ $complement->rendement_par_spec_a_hectare ?? 'Non spécifié' }}<br>
                                                <strong>Variété de semences :</strong> {{ $complement->variete_de_semences ?? 'Non spécifié' }}<br>
                                                <strong>Cycle des spéculations :</strong> {{ $complement->cycle_speculations ?? 'Non spécifié' }}<br>
                                                <strong>Bénéfice de crédit d'état ou d'institutions spécialisées :</strong> {{ $complement->benefi_credit_etat_institutions_specialisees ?? 'Non spécifié' }}<br>
                                                <strong>Crédit contracté auprès d'une banque privée :</strong> {{ $complement->contracte_credit_banque_privee ?? 'Non spécifié' }}<br>
                                                <strong>Demande de crédit auprès d'une banque privée :</strong> {{ $complement->demande_credit_banque_privee ?? 'Non spécifié' }}<br>
                                                <strong>Pourquoi :</strong> {{ $complement->pourquoi ?? 'Non spécifié' }}<br>
                                                <strong>Difficultés rencontrées :</strong> {{ json_encode($complement->difficultes_rencontrees) ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de stockage :</strong> {{ $complement->problemes_stockage ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de formation :</strong> {{ $complement->problemes_formation ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de commercialisation :</strong> {{ $complement->problemes_commercialisation ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes financiers :</strong> {{ $complement->problemes_financier ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes d'approvisionnement en eau :</strong> {{ $complement->problemes_approvisionnement_en_eau ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes d'encadrement technique :</strong> {{ $complement->problemes_encadrement_technique ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de machine :</strong> {{ $complement->probleme_de_machine ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de clôture :</strong> {{ $complement->probleme_de_cloture ?? 'Non spécifié' }}<br>
                                                <strong>Problèmes de canalisation :</strong> {{ $complement->probleme_de_canalisation ?? 'Non spécifié' }}<br>
                                                <strong>Autres problèmes :</strong> {{ $complement->autres_problemes ?? 'Non spécifié' }}<br>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $complements->links() }}
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
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; margin: 20px; } .complement { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; } </style>');
        printWindow.document.write('</head><body>');

        // Ajout du logo et des couleurs
        printWindow.document.write('<img src="{{ asset('template/images/GEREMELOGO.png') }}" alt="Logo" style="width: 150px; margin-bottom: 20px;">');
        printWindow.document.write('<h1 style="text-align: center;">Liste des complements Irriguées</h1>');

        // Liste complète des champs à afficher (inclure tous les champs nécessaires)
        var fieldNames = [
            'Wilaya', 'Moughataa', 'Commune', 'Périmètre', 'Localité', 'Date d\'Aménagement', 'Superficie Mise en Valeur',
            'Vocation du Périmètre', 'Nature de l\'Organisation', 'Nombre d\'Adhérents', 'Nombre d\'Hommes', 'Nombre de Femmes',
            'Date de Régularisation', 'Numéro de Récépissé', 'Nom du Dirigeant', 'Téléphone', 'Propriété Terrain', 'Mode Acquisition',
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
        var rows = document.querySelectorAll('#complementsTable tbody tr');
        rows.forEach(function(row) {
            var id = row.id.replace('row', ''); // Extraire l'ID de la ligne
            var detailRow = document.querySelector('#details' + id); // Sélectionner la ligne de détails correspondante

            printWindow.document.write('<div class="complement">');
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
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; margin: 20px; } .complement { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; } </style>');
        printWindow.document.write('</head><body>');

        // Ajout du logo et des couleurs
        printWindow.document.write('<img src="{{ asset('template/images/GEREMELOGO.png') }}" alt="Logo" style="width: 150px; margin-bottom: 20px;">');
        printWindow.document.write('<h1 style="text-align: center;">Détails de l\'complement Irriguée</h1>');

        // Noms des champs à afficher
        var fieldNames = [
            'Wilaya', 'Moughataa', 'Commune', 'Périmètre', 'Localité', 'Date d\'Aménagement', 'Superficie Mise en Valeur',
            'Vocation du Périmètre', 'Nature de l\'Organisation', 'Nombre d\'Adhérents', 'Nombre d\'Hommes', 'Nombre de Femmes',
            'Date de Régularisation', 'Numéro de Récépissé', 'Nom du Dirigeant', 'Téléphone', 'Propriété Terrain', 'Mode Acquisition',
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

        printWindow.document.write('<div class="complement">');
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
