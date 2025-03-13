<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiches d'Enquêtes Cooperatives rizicoles</title>
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
            width: 130px;
            height: auto;
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
    <div class="header">
        <div>
            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('template/images/GEREMLOGO.jpg')))}}" class="logo">
            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('template/images/Logo-Finance-par-l-Union-europeenne.jpg')))}}" class="logo">
            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('template/images/ENABE1L.png')))}}" class="logo">
        </div>
        <div>Groupe d'Études et de Recherches Multiples</div>
        <div class="project-title">SECURALIM</div>
    </div>
    <h1 style="text-align: center;">Fiches d'enquêtes de coopératives rizicoles</h1>

    @foreach($cooperatives as $cooperative)
        <div class="fiche-container">
            <div class="fiche-header">Coopérative : {{ $cooperative->nom_cooperative }}</div>

            <div class="fiche-section">
                <div><span class="info-label">Wilaya :</span><span class="info-value">{{ $cooperative->wilaya->nom_du_wilaya }}</span></div>
                <div><span class="info-label">Moughataa :</span><span class="info-value">{{ $cooperative->moughataa->nom_du_moughataa ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Commune :</span><span class="info-value">{{ $cooperative->commune->nom_du_commune ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Localité :</span><span class="info-value">{{ $cooperative->localite->nom_du_localite ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Périmètre :</span><span class="info-value">{{ $cooperative->perimetre->nom_du_perimetre ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Coordonnées GPS :</span><span class="info-value">{{ $cooperative->coordonnees_gps ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Type de Périmètre :</span><span class="info-value">{{ $cooperative->type_perimetre ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Statut de l'Organisation :</span><span class="info-value">{{ $cooperative->status_de_lorganisation ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Nombre d'Adhérents :</span><span class="info-value">{{ $cooperative->nombre_adherents ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Nombre de Femmes :</span><span class="info-value">{{ $cooperative->nombre_femme ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Nom du Président :</span><span class="info-value">{{ $cooperative->nom_du_president ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Contact du Président :</span><span class="info-value">{{ $cooperative->contact_du_president ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Deuxième Contact :</span><span class="info-value">{{ $cooperative->deuxieme_contact ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Superficie Totale :</span><span class="info-value">{{ $cooperative->superficie_totale ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Superficie Emblavée Hivernale :</span><span class="info-value">{{ $cooperative->superficie_emblavee_hivernale ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Superficie Emblavée Contre-Saison :</span><span class="info-value">{{ $cooperative->superficie_emblavee_contre_sais ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Spéculation Principale :</span><span class="info-value">{{ $cooperative->speculation_principale ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Type de Semences Utilisées :</span><span class="info-value">{{ $cooperative->type_semences_utilises ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Varieté de Semences :</span><span class="info-value">{{ $cooperative->variete_de_semences_utilises ?? 'Non spécifié' }}</span></div>
            </div>

            <div class="fiche-section">
                <div><span class="info-label">Source de Financement :</span><span class="info-value">{{ $cooperative->source_de_financement ?? 'Non spécifié' }}</span></div>
                <div><span class="info-label">Caisse ou Fonds de Roulement :</span><span class="info-value">{{ $cooperative->caisse_ou_fond_deroulement ?? 'Non spécifié' }}</span></div>
            </div>
        </div>
    @endforeach
</body>
</html>
