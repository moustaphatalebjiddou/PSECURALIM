@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Périmètres</h3>
                            <a href="{{ route('perimetres.create') }}" class="btn btn-primary float-right">Ajouter un Périmètre</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom de la Localité</th>
                                        <th>Nom du Périmètre</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perimetres as $perimetre)
                                        <tr>
                                            <td>{{ $perimetre->id }}</td>
                                            <td>{{ $perimetre->localite->nom_du_localite }}</td>
                                            <td>{{ $perimetre->nom_du_perimetre }}</td>
                                            <td>
                                                <a href="{{ route('perimetres.edit', $perimetre->id) }}" class="btn btn-sm btn-info">Modifier</a>
                                                <form action="{{ route('perimetres.destroy', $perimetre->id) }}" method="POST" style="display:inline-block;">
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
                                        <th>Nom de la Localité</th>
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
