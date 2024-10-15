@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Localités</h3>
                            <a href="{{ route('localites.create') }}" class="btn btn-primary float-right">Ajouter une Localité</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom de Localité</th>
                                        <th>Commune</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($localites as $localite)
                                        <tr>
                                            <td>{{ $localite->id }}</td>
                                            <td>{{ $localite->nom_du_localite }}</td>
                                            <td>{{ $localite->commune->nom_du_commune }}</td>
                                            <td>
                                                <a href="{{ route('localites.edit', $localite->id) }}" class="btn btn-sm btn-info">Modifier</a>
                                                <form action="{{ route('localites.destroy', $localite->id) }}" method="POST" style="display:inline-block;">
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
                                        <th>Nom de Localité</th>
                                        <th>Commune</th>
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
