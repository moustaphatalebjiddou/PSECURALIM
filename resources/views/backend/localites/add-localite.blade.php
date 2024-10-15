@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une Localité</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('localites.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nom_du_localite">Nom de la Localité</label>
                                    <input type="text" name="nom_du_localite" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="commune_id">Commune</label>
                                    <select name="commune_id" class="form-control" required>
                                        @foreach($communes as $commune)
                                            <option value="{{ $commune->id }}">{{ $commune->nom_du_commune }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
