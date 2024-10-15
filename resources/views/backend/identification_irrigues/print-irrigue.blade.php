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
            <img src="{{ asset('template/images/GEREMLOGO.jpg') }}" alt="Logo" height="180">
        </div>

        <!-- Titre centré -->
        <div class="text-center title-container">
            <h3>Programme SECURALIM</h3>
            <h4 class="text-muted well well-sm shadow-none">Perimetre Irrigue</h4>
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
                            <h5><strong>Wilaya:</strong> {{ $irrigues->wilaya->nom_du_wilaya }}</h5>
                            <h5><strong>Moughataa:</strong> {{ $irrigues->moughataa->nom_du_moughataa }}</h5>
                            <h5><strong>Commune:</strong> {{ $irrigues->commune->nom_du_commune }}</h5>
                            <h5><strong>Localité:</strong> {{ $irrigues->localite->nom_du_localite }}</h5>
                            <h5><strong>Périmètre:</strong> {{ $irrigues->perimetre->nom_du_perimetre }}</h5>

                            <!-- Vocation du périmètre -->
                            <h5><strong>Vocation du périmètre:</strong>
                                @if (is_array($irrigues->vocation_du_perimetre))
                                    @foreach ($irrigues->vocation_du_perimetre as $vocation)
                                        {{ $vocation }},
                                    @endforeach
                                @else
                                    Aucune donnée disponible
                                @endif
                            </h5>

                            <!-- Informations organisationnelles -->
                            <h5><strong>Nature de l'organisation:</strong> {{ $irrigues->nature_de_l_organisation }}</h5>
                            <h5><strong>Nombre d'adhérents:</strong> {{ $irrigues->nombre_adherents }}</h5>
                            <h5><strong>Nombre d'hommes:</strong> {{ $irrigues->nombre_homme }}</h5>
                            <h5><strong>Nombre de femmes:</strong> {{ $irrigues->nombre_femme }}</h5>
                            <h5><strong>Date de régularisation de la structure exploitante:</strong> {{ $irrigues->date_regul_stru_exploitant }}</h5>
                            <h5><strong>Numéro de récépissé de reconnaissance:</strong> {{ $irrigues->recepisse_reconnaissance }}</h5>
                            <h5><strong>Nom du dirigeant de la structure exploitante:</strong> {{ $irrigues->nom_du_dirigeant_strc_exploitant }}</h5>
                            <h5><strong>Téléphone:</strong> {{ $irrigues->telephone }}</h5>

                            <h3 class="bg-info">Aspects Fonciers </h3>

                            <h5><strong>Superficie Mise En Valeur :</strong> {{ $irrigues->superficie_mise_en_valeur }}</h5>
                            <h5><strong>Date Mise En Valeur :</strong> {{ $irrigues->date_de_mise_en_valeur }}</h5>
                            <h5><strong>Propriete de terrain :</strong> {{ $irrigues->propriete_terrain }}</h5>
                            <h5><strong>Mode d'acquisition :</strong>
                                {{ is_array($irrigues->mode_acquisition) ? implode(', ', $irrigues->mode_acquisition) : $irrigues->mode_acquisition }}
                            </h5>


                            
                            <h3 class="bg-info">Aspects économiques et sociaux </h3>
                            <!-- Aspects économiques et sociaux -->
                            <h5><strong>Aspects économiques et sociaux:</strong>
                                @if (is_array($irrigues->aspects_eco_sociaux))
                                    @foreach ($irrigues->aspects_eco_sociaux as $aspect)
                                        {{ $aspect }},
                                    @endforeach
                                @else
                                    Aucune donnée disponible
                                @endif
                            </h5>

                            <!-- Informations diverses -->

                            <h5><strong>Organe de gestion:</strong> {{ $irrigues->organe_de_gestion }}</h5>
                            <h5><strong>Djamaa:</strong> {{ $irrigues->djamaa }}</h5>
                            <h5><strong>Chef de village:</strong> {{ $irrigues->chef_village }}</h5>
                            <h5><strong>Par rachat:</strong> {{ $irrigues->par_rachat }}</h5>
                            <h5><strong>Par voie d'héritage:</strong> {{ $irrigues->par_voie_heritage }}</h5>
                            <h5><strong>Femme dirigeante:</strong> {{ $irrigues->femme_dirigeante }}</h5>
                            <h5><strong>Nombre de femmes exploitantes:</strong> {{ $irrigues->nombre_femmes_exploitantes }}</h5>

                            <!-- Informations sur les paiements -->
                            <h5><strong>Paient-elles en nature ?</strong> {{ $irrigues->payent_elles_nature }}</h5>
                            <h5><strong>Paient-elles en espèces ?</strong> {{ $irrigues->payent_elles_espece }}</h5>
                            <h5><strong>Paient-elles un loyer ?</strong> {{ $irrigues->payent_elles_un_loyer }}</h5>
                            <h5><strong>Paient-elles un rempechen ?</strong> {{ $irrigues->payent_elles_un_rempechen }}</h5>
                            <h5><strong>Paient-elles en assakal ?</strong> {{ $irrigues->payent_elles_assakal }}</h5>

                            <!-- Informations agricoles -->
                            <h5><strong>Spéculations pratiquées:</strong> {{ $irrigues->speculations_pratiquees }}</h5>
                            <h5><strong>Rendement par spéculation à hectare:</strong> {{ $irrigues->rendement_par_spec_a_hectare }}</h5>
                            <h5><strong>Variété de semences:</strong> {{ $irrigues->variete_de_semences }}</h5>
                            <h5><strong>Cycle de spéculations:</strong> {{ $irrigues->cycle_speculations }}</h5>

                            <!-- Informations sur les crédits -->
                            <h5><strong>Crédit d'État ou institutions spécialisées:</strong> {{ $irrigues->benefi_credit_etat_institutions_specialisees }}</h5>
                            <h5><strong>Contrat de crédit banque privée:</strong> {{ $irrigues->contracte_credit_banque_privee }}</h5>
                            <h5><strong>Demande de crédit banque privée:</strong> {{ $irrigues->demande_credit_banque_privee }}</h5>
                            <h5><strong>Pourquoi ?</strong> {{ $irrigues->pourquoi }}</h5>

                            <!-- Informations sur les difficultés -->
                            <h3>Difficultes Rencontres</h3>
                            <h5><strong>Difficultés rencontrées:</strong>
                                @if (is_array($irrigues->difficultes_rencontrees))
                                    @foreach ($irrigues->difficultes_rencontrees as $difficulte)
                                        {{ $difficulte }},
                                    @endforeach
                                @else
                                    Aucune donnée disponible
                                @endif
                            </h5>
                            <!-- Problèmes spécifiques -->
                            <h5><strong>Problèmes de stockage:</strong> {{ $irrigues->problemes_stockage }}</h5>
                            <h5><strong>Problèmes de formation:</strong> {{ $irrigues->problemes_formation }}</h5>
                            <h5><strong>Problèmes de commercialisation:</strong> {{ $irrigues->problemes_commercialisation }}</h5>
                            <h5><strong>Problèmes financiers:</strong> {{ $irrigues->problemes_financier }}</h5>
                            <h5><strong>Problèmes d'approvisionnement en eau:</strong> {{ $irrigues->problemes_approvisionnement_en_eau }}</h5>
                            <h5><strong>Problèmes d'encadrement technique:</strong> {{ $irrigues->problemes_encadrement_technique }}</h5>
                            <h5><strong>Problèmes de machine:</strong> {{ $irrigues->probleme_de_machine }}</h5>
                            <h5><strong>Problèmes de clôture:</strong> {{ $irrigues->probleme_de_cloture }}</h5>
                            <h5><strong>Problèmes de canalisation:</strong> {{ $irrigues->probleme_de_canalisation }}</h5>
                            <h5><strong>Autres problèmes:</strong> {{ $irrigues->autres_problemes }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
