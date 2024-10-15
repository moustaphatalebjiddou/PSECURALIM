@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Ajouter une Commune</div>

                        <div class="card-body">
                            <form action="{{ route('communes.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nom_du_commune">Nom de Commune</label>
                                    <input type="text" name="nom_du_commune" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="moughataa_id">Moughataa</label>
                                    <select name="moughataa_id" class="form-control" required>
                                        <option value="">Sélectionnez une Moughataa</option>
                                        @foreach($moughataas as $moughataa)
                                            <option value="{{ $moughataa->id }}">{{ $moughataa->nom_du_moughataa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
