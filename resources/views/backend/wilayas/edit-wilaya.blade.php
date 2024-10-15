// resources/views/wilayas/form.blade.php

@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ isset($wilaya) ? 'Modifier la Wilaya' : 'Ajouter une Wilaya' }}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ isset($wilaya) ? route('wilayas.update', $wilaya->id) : route('wilayas.store') }}" method="POST">
                                @csrf
                                @if(isset($wilaya))
                                    @method('PUT')
                                @endif
                                <div class="form-group">
                                    <label for="nom_du_wilaya">Nom du Wilaya</label>
                                    <input type="text" class="form-control" id="nom_du_wilaya" name="nom_du_wilaya" value="{{ old('nom_du_wilaya', $wilaya->nom_du_wilaya ?? '') }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ isset($wilaya) ? 'Mettre à jour' : 'Ajouter' }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
