<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiches d'Enquêtes des Périmètres Irrigués</title>
    <style>
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 2px solid black;
        }
        .logo {
            width: 130px; /* Ajuste ici la largeur pour réduire la taille */
            height: auto; /* Garde les proportions de l'image */
        }
        .project-title {
            text-align: right;
            font-size: 1.5em;
            font-weight: bold;
        }
        .fiche-container {
            margin: 20px;
            padding: 15px;
            border: 1px solid black;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .fiche-header {
            font-size: 1.5em;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .fiche-section {
            margin-bottom: 20px;
        }
        .fiche-section strong {
            display: block;
            margin-bottom: 5px;
        }
        .info-label {
            font-weight: bold;
        }
        .info-value {
            margin-left: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <!-- En-tête avec logo et nom du projet -->
    <div class="header">
        <div>
            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('template/images/GEREMLOGO.jpg')))}}" class="logo">
        </div> Groupe d'etudes et de recherches multiples
        <div class="project-title">SECURALIM</div>
    </div>
    <h1 style="text-align: center;">Fiches d'enquêtes des périmètres irrigués</h1>

    <!-- Affichage des fiches -->
    @foreach($identifications as $identification)
        <div class="fiche-container">
            <div class="fiche-header">
                Périmètre Irrigué - Wilaya : {{ $identification->wilaya->nom_du_wilaya }}
            </div>

            <!-- Affichage des informations -->
            <div class="fiche-section">
                <div><span class="info-label">Moughataa :</span><span class="info-value">{{ $identification->moughataa->nom_du_moughataa ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Commune :</span><span class="info-value">{{ $identification->commune->nom_du_commune ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Localité :</span><span class="info-value">{{ $identification->localite->nom_du_localite ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Périmètre :</span><span class="info-value">{{ $identification->perimetre->nom_du_perimetre ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Date d'Aménagement :</span><span class="info-value">{{ $identification->date_amenagement ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Superficie Mise en Valeur :</span><span class="info-value">{{ $identification->superficie_mise_en_valeur ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Vocation du Périmètre :</span>
                    <span class="info-value">
                        @if(is_array($identification->vocation_du_perimetre))
                            {{ implode(', ', $identification->vocation_du_perimetre) }}
                        @else
                            {{ $identification->vocation_du_perimetre ?? 'Non spécifié' }}
                        @endif
                    </span>
                </div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Nature de l'Organisation :</span><span class="info-value">{{ $identification->nature_de_l_organisation ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Nombre d'Adhérents :</span><span class="info-value">{{ $identification->nombre_adherents ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Nombre d'Hommes :</span><span class="info-value">{{ $identification->nombre_homme ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Nombre de Femmes :</span><span class="info-value">{{ $identification->nombre_femme ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Nom du Dirigeant :</span><span class="info-value">{{ $identification->nom_du_dirigeant_strc_exploitant ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Téléphone du Dirigeant :</span><span class="info-value">{{ $identification->telephone ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Droit d'Exploitation :</span>
                    <span class="info-value">
                        @if(is_array($identification->droit_exploitation_perimetre))
                            {{ implode(', ', $identification->droit_exploitation_perimetre) }}
                        @else
                            {{ $identification->droit_exploitation_perimetre ?? 'Non spécifié' }}
                        @endif
                    </span>
                </div>
                <div><span class="info-label">Origine du Droit :</span><span class="info-value">{{ $identification->origine_du_droit ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Occupation Irrégulière :</span><span class="info-value">{{ $identification->occupation_irreguliere_du_domaine_de_etat ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Domaine Privé de l'État :</span><span class="info-value">{{ $identification->domaine_prive_de_etat ?? 'Non spécifié' }}</span></div>
            </div>
        </div>
    @endforeach
</body>
</html>
