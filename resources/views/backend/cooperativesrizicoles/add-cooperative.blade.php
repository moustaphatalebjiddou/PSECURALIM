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
                            <h3 class="card-title">Ajouter une enquete champs irrigues en complement</h3>
                        </div>
                        <div class="card-body">
                            <form id="multiStepForm"  action="{{ route('complement.store') }}" method="POST">
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


            <!-- Nom de la Coopérative -->
            <div class="col-md-6 mb-3">
                <label for="nom_cooperative">Nom de la Coopérative</label>
                <input type="text" class="form-control @error('nom_cooperative') is-invalid @enderror" name="nom_cooperative" id="nom_cooperative" value="{{ old('nom_cooperative') }}" required>
                @error('nom_cooperative')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <!-- Coordonnées GPS -->
            <div class="col-md-6 mb-3">
                <label for="coordonnees_gps">Coordonnées GPS</label>
                <input type="text" class="form-control @error('coordonnees_gps') is-invalid @enderror" name="coordonnees_gps" id="coordonnees_gps" value="{{ old('coordonnees_gps') }}" required>
                @error('coordonnees_gps')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Type de Périmètre -->
            <div class="col-md-6 mb-3">
                <label for="type_perimetre">Type de Périmètre</label>
                <input type="text" class="form-control @error('type_perimetre') is-invalid @enderror" name="type_perimetre" id="type_perimetre" value="{{ old('type_perimetre') }}" required>
                @error('type_perimetre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <!-- Statut de l'Organisation -->
            <div class="col-md-6 mb-3">
                <label for="status_de_lorganisation">Statut de l'Organisation</label>
                <input type="text" class="form-control @error('status_de_lorganisation') is-invalid @enderror" name="status_de_lorganisation" id="status_de_lorganisation" value="{{ old('status_de_lorganisation') }}" required>
                @error('status_de_lorganisation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nombre d'Adhérents -->
            <div class="col-md-6 mb-3">
                <label for="nombre_adherents">Nombre d'Adhérents</label>
                <input type="number" class="form-control @error('nombre_adherents') is-invalid @enderror" name="nombre_adherents" id="nombre_adherents" value="{{ old('nombre_adherents') }}" required>
                @error('nombre_adherents')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <!-- Nombre de Femmes -->
            <div class="col-md-6 mb-3">
                <label for="nombre_femme">Nombre de Femmes</label>
                <input type="number" class="form-control @error('nombre_femme') is-invalid @enderror" name="nombre_femme" id="nombre_femme" value="{{ old('nombre_femme') }}" required>
                @error('nombre_femme')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nom du Président -->
            <div class="col-md-6 mb-3">
                <label for="nom_du_president">Nom du Président</label>
                <input type="text" class="form-control @error('nom_du_president') is-invalid @enderror" name="nom_du_president" id="nom_du_president" value="{{ old('nom_du_president') }}" required>
                @error('nom_du_president')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <!-- Contact du Président -->
            <div class="col-md-6 mb-3">
                <label for="contact_du_president">Contact du Président</label>
                <input type="text" class="form-control @error('contact_du_president') is-invalid @enderror" name="contact_du_president" id="contact_du_president" value="{{ old('contact_du_president') }}" required>
                @error('contact_du_president')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <!-- Contact du Président -->
            <div class="col-md-6 mb-3">
                <label for="contact_du_president">Contact du Président</label>
                <input type="text" class="form-control @error('contact_du_president') is-invalid @enderror" name="contact_du_president" id="contact_du_president" value="{{ old('contact_du_president') }}" required>
                @error('contact_du_president')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Boutons -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('cooperativerizicole.index') }}" class="btn btn-secondary">Retour à la Liste</a>
    </form>
</div>

<script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Lorsque la Wilaya est sélectionnée
    $('#wilaya').change(function() {
        var wilaya_id = $(this).val();
        if (wilaya_id) {
            // Activer la sélection de la Moughataa
            $('#moughataa').prop('disabled', false);
            $.ajax({
                url: '/get-moughataas/' + wilaya_id, // URL de la requête AJAX
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Vider les options actuelles
                    $('#moughataa').empty().append('<option value="">Sélectionner une Moughataa</option>');

                    // Ajouter les nouvelles options de Moughataa
                    $.each(data, function(key, value) {
                        $('#moughataa').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            // Si aucune Wilaya n'est sélectionnée, désactiver la Moughataa
            $('#moughataa').prop('disabled', true).empty();
        }
    });
});
</script>

</script>

@endsection
