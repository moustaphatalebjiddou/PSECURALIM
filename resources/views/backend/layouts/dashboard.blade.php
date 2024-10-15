@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tableau de bord</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <h4 class="breadcrumb-item active">Périmètres Irrigués</h4>
            <div class="row">

                <!-- Statistiques -->
                   <div class="col-md-12">
                        <!-- Tableau des Natures d'Organisation avec largeur ajustée -->
                        <table class="table table-bordered table-striped w-100" style="width: 100%; max-width: 100%; margin-right: 0;">
                            <thead>
                                <tr class="bg-info">
                                    <th>Nature de l'Organisation</th>
                                    <th>Nombre d'Organisations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($naturesOrganisations as $nature)
                                    <tr>
                                        <td>{{ $nature->nature_de_l_organisation }}</td>
                                        <td>{{ $nature->count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-primary"><i class="fas fa-chart-line"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total des enquêtes <br> réalisées<br></span>
                                <span class="info-box-number">{{ $totalEnquetes }}</span>
                            </div>
                        </div>
                    </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-male"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Hommes <br><br></span>
                            <span class="info-box-number">{{ $stats->total_hommes }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-female"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Femmes <br><br></span>
                            <span class="info-box-number">{{ $stats->total_femmes }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Étrangers <br> Cultivants</span>
                            <span class="info-box-number">{{ $stats->total_etrangers }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="fas fa-leaf"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Superficie Mise en Valeur <br><br></span>
                            <span class="info-box-number">{{ $stats->total_superficie }} hectares</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-secondary p-3"><i class="fas fa-user-friends"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Nombre Adhérents <br><br></span>
                            <span class="info-box-number">{{ $stats->total_adherents }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-female"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Femmes Exploitantes <br><br></span>
                            <span class="info-box-number">{{ $stats->total_femmes_exploitantes }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Difficultés Rencontrées - Texte Défilant -->
            <div class="row">
                <div class="col-md-12">
                    <div class="scrolling-text-container">
                        <h3 style="font-weight: bold; color:aliceblue;">Difficultés Rencontrées</h3>
                        <div class="scrolling-text">
                            @if (count($difficultesFlat) > 0)
                                @foreach ($difficultesFlat as $difficulte)
                                    <span class="scrolling-item">{{ $difficulte }}</span>
                                @endforeach
                            @else
                                <span class="scrolling-item">Aucune difficulté rencontrée pour le moment.</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Graphique des vocations du périmètre -->
            <h4 style="color: blue;">Graphique des Vocations du Périmètre</h4>
            <div class="row">
                <div class="col-md-6">
                    <canvas id="vocationChart" style="max-height: 300px;"></canvas>
                    <p id="chartExplanation" style="margin-top: 20px; font-weight: bold; color: blue;"></p>
                </div>
                <div class="col-md-6">
                    <h4 style="color: blue;">Répartition des Terrains</h4>
                    <canvas id="terrainChart" style="max-height: 300px;"></canvas>
                    <p id="terrainChartDescription" style="margin-top: 20px; font-weight: bold; color: blue;">
                        Ce graphique montre la répartition des différents types de terrains cultivés.
                    </p>
                </div>
        </div>


<!-- Distribution des Parcelles et Mode d'acquisition - Graphiques côte à côte -->
<div class="row mt-3 d-flex justify-content-between">
    <!-- Graphique de la distribution des parcelles -->
    <div class="col-md-5"> <!-- Ajustez cette colonne pour réduire la taille -->
        <h4 style="color:blue;">Distribution des Parcelles</h4>
        <canvas id="parcellesChart" width="250" height="50"></canvas> <!-- Taille réduite -->
        <p id="terrainChartDescription" style="margin-top: 20px; font-weight: bold; color: blue;">
            Ce graphique montre la responsabilité de la distribution des parcelles.
        </p>
    </div>

    <!-- Graphique du mode d'acquisition du droit -->
    <div class="col-md-5"> <!-- Colonne plus petite pour le mode d'acquisition -->
        <h4 style="color: blue;">Mode d'acquisition du droit</h4>
        <canvas id="modeAcquisitionChart" width="200" height="200"></canvas> <!-- Taille plus petite -->
        <p id="terrainChartDescription" style="margin-top: 20px; font-weight: bold; color: blue;">
            Ce graphique montre le mode d'acquisition du droit selon les cases coches.
        </p>
    </div>
</div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Données à partir du backend
    const dataFromBackend = @json($data);

    // Configuration du graphique des vocations
    const labels = [];
    const vocationCounts = {};

    for (let wilaya in dataFromBackend) {
        for (let moughataa in dataFromBackend[wilaya]) {
            for (let commune in dataFromBackend[wilaya][moughataa]) {
                for (let localite in dataFromBackend[wilaya][moughataa][commune]) {
                    const vocations = dataFromBackend[wilaya][moughataa][commune][localite];
                    vocations.forEach(vocation => {
                        if (!labels.includes(vocation)) {
                            labels.push(vocation);
                        }
                        if (!vocationCounts[vocation]) {
                            vocationCounts[vocation] = 0;
                        }
                        vocationCounts[vocation]++;
                    });
                }
            }
        }
    }

    const counts = labels.map(label => vocationCounts[label] || 0);

    const ctx = document.getElementById('vocationChart').getContext('2d');
    const vocationChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre de Périmètres par Vocation',
                data: counts,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Nombre de Périmètres'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Vocations'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Données pour le graphique circulaire
    const terrainData = {
        labels: [
            'Terrains Loués',
            'Terrains Prêtés',
            'Vente à Étrangers',
            'Vente à Membres',
            'Prêt à Étrangers',
            'Location à Membres'
        ],
        datasets: [{
            label: 'Répartition des Terrains',
            data: [
                {{ $terrainsLoue }},
                {{ $terrainsPrete }},
                {{ $peutVendreAEtrangers }},
                {{ $peutVendreAMembres }},
                {{ $peutPreterAEtrangers }},
                {{ $peutLouerAMembres }}
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)', // rouge
                'rgba(54, 162, 235, 0.6)', // bleu
                'rgba(255, 206, 86, 0.6)', // jaune
                'rgba(75, 192, 192, 0.6)', // turquoise
                'rgba(153, 102, 255, 0.6)', // violet
                'rgba(255, 159, 64, 0.6)'  // orange
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    const ctx2 = document.getElementById('terrainChart').getContext('2d');
    const terrainChart = new Chart(ctx2, {
        type: 'pie',
        data: terrainData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    document.getElementById('chartExplanation').innerHTML = "Ce graphique représente le nombre de périmètres selon leur vocation.";
 // Données pour le graphique circulaire de la distribution des parcelles
 const parcellesData = {
        labels: [
            'Organe de gestion',
            'Djamaa',
            'Chef du village',
            'Autres' // Ajoutez d'autres catégories si nécessaire
        ],
        datasets: [{
            label: 'Répartition des Parcelles',
            data: [
                {{ $distributionParcelles['Organe de gestion'] ?? 0 }},
                {{ $distributionParcelles['Djamaa'] ?? 0 }},
                {{ $distributionParcelles['Chef du village'] ?? 0 }},
                {{ $distributionParcelles['Autres'] ?? 0 }} // Vous pouvez définir une valeur par défaut ici
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)', // rouge
                'rgba(54, 162, 235, 0.6)', // bleu
                'rgba(255, 206, 86, 0.6)', // jaune
                'rgba(75, 192, 192, 0.6)'  // turquoise
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Configuration et création du graphique
    const ctxParcelles = document.getElementById('parcellesChart').getContext('2d');
    const parcellesChart = new Chart(ctxParcelles, {
        type: 'pie',
        data: parcellesData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Données pour le graphique du mode d'acquisition du droit
    const modesAcquisitionData = {
        labels: [
            'Acheté',
            'Loué',
            'Hérité',
            'Donné',
            'Prêté'
        ],
        datasets: [{
            label: 'Nombre de terrains',
            data: [
                {{ $modesAcquisition['acheté'] ?? 0 }},
                {{ $modesAcquisition['loué'] ?? 0 }},
                {{ $modesAcquisition['hérité'] ?? 0 }},
                {{ $modesAcquisition['donné'] ?? 0 }},
                {{ $modesAcquisition['prêté'] ?? 0 }}
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)', // rouge
                'rgba(54, 162, 235, 0.6)', // bleu
                'rgba(255, 206, 86, 0.6)', // jaune
                'rgba(75, 192, 192, 0.6)', // turquoise
                'rgba(153, 102, 255, 0.6)' // violet
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: modesAcquisitionData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const modeAcquisitionChart = new Chart(
        document.getElementById('modeAcquisitionChart'),
        config
    );
</script>
@endsection
