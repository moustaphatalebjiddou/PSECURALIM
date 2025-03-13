@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
<!-- Header avec logo et informations de contact -->
<div class="row justify-content-between mb-4">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
        <!-- Logo aligné à gauche -->
        <div class="logo-container text-left">
            <img src="{{ asset('template/images/logogereme.jpg') }}" style="width: 80px; height:80px;" alt="Logo">
            <img src="{{ asset('template/images/Logo-Finance-par-l-Union-europeenne.jpg') }}" style="width: 150px; height:150px;" alt="Logo">
            <img src="{{ asset('template/images/ENABE1L.png') }}" style="width: 90px; height:100px;" alt="Logo">
        </div>

        <!-- Titre centré -->
        <div class="text-center title-container">
            <h3>Programme SECURALIM</h3>
            <h4 class="text-muted well well-sm shadow-none">Champs complement En Complement </h4>
        </div>

        <!-- Informations alignées à droite -->
        <div class="contact-info text-right">
            <p><strong>Groupe d'etudes et de recherches multiples</strong> (GEREME-SARL)</p>
            <p>332 ZRB Nouakchott, BP 6999</p>
            <p>Tél: 222 41146957 - 27273333</p>
            <p>Email: tewfigerm@yahoo.com</p>
        </div>
    </div>
</div>



                <!-- /.col -->

                <!-- /.col -->
              </div>
            <!-- Titre de la page -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Détails de l'enquête</h4>
                            <button onclick="window.print()" class="btn btn-primary float-right">Imprimer</button>
                        </div>

                        <div class="card-body">
                            <h3 class="bg-info">Identifications</h3>
                            <!-- Informations de l'enquête -->
                            <h5><strong>Wilaya:</strong> {{ $complement->wilaya->nom_du_wilaya }}</h5>
                            <h5><strong>Moughataa:</strong> {{ $complement->moughataa->nom_du_moughataa }}</h5>
                            <h5><strong>Commune:</strong> {{ $complement->commune->nom_du_commune }}</h5>
                            <h5><strong>Localité:</strong> {{ $complement->localite->nom_du_localite }}</h5>
                            <h5><strong>Périmètre:</strong> {{ $complement->perimetre->nom_du_perimetre }}</h5>

                            <!-- Vocation du périmètre -->
                            <h5><strong>Vocation du périmètre:</strong>
                                @if (is_array($complement->vocation_du_perimetre))
                                    @foreach ($complement->vocation_du_perimetre as $vocation)
                                        {{ $vocation }},
                                    @endforeach
                                @else
                                    Aucune donnée disponible
                                @endif
                            </h5>

                            <!-- Informations organisationnelles -->
                            <h5><strong>Nature de l'organisation:</strong> {{ $complement->nature_de_l_organisation }}</h5>
                            <h5><strong>Nombre d'adhérents:</strong> {{ $complement->nombre_adherents }}</h5>
                            <h5><strong>Nombre d'hommes:</strong> {{ $complement->nombre_homme }}</h5>
                            <h5><strong>Nombre de femmes:</strong> {{ $complement->nombre_femme }}</h5>
                            <h5><strong>Date de régularisation de la structure exploitante:</strong> {{ $complement->date_regul_stru_exploitant }}</h5>
                            <h5><strong>Numéro de récépissé de reconnaissance:</strong> {{ $complement->recepisse_reconnaissance }}</h5>
                            <h5><strong>Nom du dirigeant de la structure exploitante:</strong> {{ $complement->nom_du_dirigeant_strc_exploitant }}</h5>
                            <h5><strong>Téléphone:</strong> {{ $complement->telephone }}</h5>

                            <h3 class="bg-info">Aspects Fonciers </h3>

                            <h5><strong>Superficie Mise En Valeur :</strong> {{ $complement->superficie_mise_en_valeur }}</h5>
                            <h5><strong>Date Mise En Valeur :</strong> {{ $complement->date_de_mise_en_valeur }}</h5>
                            <h5><strong>Propriete de terrain :</strong> {{ $complement->propriete_terrain }}</h5>
                            <h5><strong>Mode d'acquisition :</strong>
                                {{ is_array($complement->mode_acquisition) ? implode(', ', $complement->mode_acquisition) : $complement->mode_acquisition }}
                            </h5>



                            <h3 class="bg-info">Aspects économiques et sociaux </h3>
                            <!-- Aspects économiques et sociaux -->
                            <h5><strong>Aspects économiques et sociaux:</strong>
                                @if (is_array($complement->aspects_eco_sociaux))
                                    @foreach ($complement->aspects_eco_sociaux as $aspect)
                                        {{ $aspect }},
                                    @endforeach
                                @else
                                    Aucune donnée disponible
                                @endif
                            </h5>

                            <!-- Informations diverses -->

                            <h5><strong>Organe de gestion:</strong> {{ $complement->organe_de_gestion }}</h5>
                            <h5><strong>Djamaa:</strong> {{ $complement->djamaa }}</h5>
                            <h5><strong>Chef de village:</strong> {{ $complement->chef_village }}</h5>
                            <h5><strong>Par rachat:</strong> {{ $complement->par_rachat }}</h5>
                            <h5><strong>Par voie d'héritage:</strong> {{ $complement->par_voie_heritage }}</h5>
                            <h5><strong>Femme dirigeante:</strong> {{ $complement->femme_dirigeante }}</h5>
                            <h5><strong>Nombre de femmes exploitantes:</strong> {{ $complement->nombre_femmes_exploitantes }}</h5>

                            <!-- Informations sur les paiements -->
                            <h5><strong>Paient-elles en nature ?</strong> {{ $complement->payent_elles_nature }}</h5>
                            <h5><strong>Paient-elles en espèces ?</strong> {{ $complement->payent_elles_espece }}</h5>
                            <h5><strong>Paient-elles un loyer ?</strong> {{ $complement->payent_elles_un_loyer }}</h5>
                            <h5><strong>Paient-elles un rempechen ?</strong> {{ $complement->payent_elles_un_rempechen }}</h5>
                            <h5><strong>Paient-elles en assakal ?</strong> {{ $complement->payent_elles_assakal }}</h5>

                            <!-- Informations agricoles -->
                            <h5><strong>Spéculations pratiquées:</strong> {{ $complement->speculations_pratiquees }}</h5>
                            <h5><strong>Rendement par spéculation à hectare:</strong> {{ $complement->rendement_par_spec_a_hectare }}</h5>
                            <h5><strong>Variété de semences:</strong> {{ $complement->variete_de_semences }}</h5>
                            <h5><strong>Cycle de spéculations:</strong> {{ $complement->cycle_speculations }}</h5>

                            <!-- Informations sur les crédits -->
                            <h5><strong>Crédit d'État ou institutions spécialisées:</strong> {{ $complement->benefi_credit_etat_institutions_specialisees }}</h5>
                            <h5><strong>Contrat de crédit banque privée:</strong> {{ $complement->contracte_credit_banque_privee }}</h5>
                            <h5><strong>Demande de crédit banque privée:</strong> {{ $complement->demande_credit_banque_privee }}</h5>
                            <h5><strong>Pourquoi ?</strong> {{ $complement->pourquoi }}</h5>

                            <!-- Informations sur les difficultés -->
                            <h3>Difficultes Rencontres</h3>
                            <h5><strong>Difficultés rencontrées:</strong>
                                @if (is_array($complement->difficultes_rencontrees))
                                    @foreach ($complement->difficultes_rencontrees as $difficulte)
                                        {{ $difficulte }},
                                    @endforeach
                                @else
                                    Aucune donnée disponible
                                @endif
                            </h5>
                            <!-- Problèmes spécifiques -->
                            <h5><strong>Problèmes de stockage:</strong> {{ $complement->problemes_stockage }}</h5>
                            <h5><strong>Problèmes de formation:</strong> {{ $complement->problemes_formation }}</h5>
                            <h5><strong>Problèmes de commercialisation:</strong> {{ $complement->problemes_commercialisation }}</h5>
                            <h5><strong>Problèmes financiers:</strong> {{ $complement->problemes_financier }}</h5>
                            <h5><strong>Problèmes d'approvisionnement en eau:</strong> {{ $complement->problemes_approvisionnement_en_eau }}</h5>
                            <h5><strong>Problèmes d'encadrement technique:</strong> {{ $complement->problemes_encadrement_technique }}</h5>
                            <h5><strong>Problèmes de machine:</strong> {{ $complement->probleme_de_machine }}</h5>
                            <h5><strong>Problèmes de clôture:</strong> {{ $complement->probleme_de_cloture }}</h5>
                            <h5><strong>Problèmes de canalisation:</strong> {{ $complement->probleme_de_canalisation }}</h5>
                            <h5><strong>Autres problèmes:</strong> {{ $complement->autres_problemes }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
