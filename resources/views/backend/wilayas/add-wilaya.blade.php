// resources/views/wilayas/create.blade.php

@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une Wilaya</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('wilayas.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nom_du_wilaya">Nom de Wilaya</label>
                                    <input type="text" name="nom_du_wilaya" id="nom_du_wilaya" class="form-control" required>
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
