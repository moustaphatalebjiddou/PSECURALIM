@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Modifier Wilaya</h5>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('wilaya.update', $wilaya->id) }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="form-group row">
                                <label for="nom_du_wilaya" class="col-sm-2 col-form-label">Nom du Wilaya</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nom_du_wilaya" value="{{ $wilaya->nom_du_wilaya }}" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="moughataa" class="col-sm-2 col-form-label">Moughataa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="moughataa" value="{{ $wilaya->moughataa }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="localite" class="col-sm-2 col-form-label">Localite</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="localite" value="{{ $wilaya->localite }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="commune" class="col-sm-2 col-form-label">Commune</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="commune" value="{{ $wilaya->commune }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom_du_perimetre" class="col-sm-2 col-form-label">Nom du Périmètre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nom_du_perimetre" value="{{ $wilaya->nom_du_perimetre }}" required>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
