@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste de lieux des affectations de travail</h3>
                            <a href="{{ route('addwilaya') }}" class="btn btn-primary float-right">Ajouter un Lieu</a> <!-- Nouveau bouton -->
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom de Wilaya</th>
                                        <th>Moughataa</th>
                                        <th>Localité</th>
                                        <th>Commune</th>
                                        <th>Nom du Périmètre</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wilayas as $key=>$wilaya)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $wilaya->nom_du_wilaya }}</td>
                                            <td>{{ $wilaya->moughataa }}</td>
                                            <td>{{ $wilaya->localite }}</td>
                                            <td>{{ $wilaya->commune }}</td>
                                            <td>{{ $wilaya->nom_du_perimetre }}</td>
                                            <td>
                                                <a href="{{ route('wilaya.edit', $wilaya->id) }}" class="btn btn-sm btn-info">Modifier</a>
                                                <form action="{{ route('wilaya.destroy', $wilaya->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom de Wilaya</th>
                                        <th>Moughataa</th>
                                        <th>Localité</th>
                                        <th>Commune</th>
                                        <th>Nom du Périmètre</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
