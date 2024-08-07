@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ajouter Wilaya</h5>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('wilaya.store') }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="nom_du_wilaya" class="col-sm-2 col-form-label">Nom du Wilaya</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nom_du_wilaya" placeholder="Entrer Nom du Wilaya" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="moughataa" class="col-sm-2 col-form-label">Moughataa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="moughataa" placeholder="Entrer Moughataa" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="localite" class="col-sm-2 col-form-label">Localite</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="localite" placeholder="Entrer Localite" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="commune" class="col-sm-2 col-form-label">Commune</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="commune" placeholder="Entrer Commune" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom_du_perimetre" class="col-sm-2 col-form-label">Nom du Périmètre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nom_du_perimetre" placeholder="Entrer Nom du Périmètre" required>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
