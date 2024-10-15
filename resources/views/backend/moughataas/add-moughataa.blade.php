@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une Moughataa</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('moughataas.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nom_du_moughataa">Nom du Moughataa</label>
                                    <input type="text" name="nom_du_moughataa" class="form-control" id="nom_du_moughataa" required>
                                </div>
                                <div class="form-group">
                                    <label for="wilaya_id">Wilaya</label>
                                    <select name="wilaya_id" class="form-control" id="wilaya_id" required>
                                        <option value="">Sélectionner une Wilaya</option>
                                        @foreach ($wilayas as $wilaya)
                                            <option value="{{ $wilaya->id }}">{{ $wilaya->nom_du_wilaya }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
