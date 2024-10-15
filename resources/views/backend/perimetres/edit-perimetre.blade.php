@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Modifier le Périmètre</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('perimetres.update', $perimetre->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="localite_id">Nom de la Localité</label>
                                    <select name="localite_id" class="form-control" required>
                                        @foreach($localites as $localite)
                                            <option value="{{ $localite->id }}" {{ $localite->id == $perimetre->localite_id ? 'selected' : '' }}>
                                                {{ $localite->nom_du_localite }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nom_du_perimetre">Nom du Périmètre</label>
                                    <input type="text" name="nom_du_perimetre" class="form-control" value="{{ $perimetre->nom_du_perimetre }}" required>
                                </div>
                                <button type="submit" class="btn btn-success">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
