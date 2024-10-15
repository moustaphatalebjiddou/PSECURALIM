@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter un Périmètre</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('perimetres.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nom_du_perimetre">Nom du Périmètre</label>
                                    <input type="text" name="nom_du_perimetre" id="nom_du_perimetre" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label for="localite_id">Nom de la Localité</label>
                                    <select name="localite_id" class="form-control" required>
                                        @foreach($localites as $localite)
                                            <option value="{{ $localite->id }}">{{ $localite->nom_du_localite }}</option>
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
