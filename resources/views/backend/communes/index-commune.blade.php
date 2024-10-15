@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Communes</h3>
                            <a href="{{ route('communes.create') }}" class="btn btn-primary float-right">Ajouter une Commune</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom de Commune</th>
                                        <th>Moughataa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($communes as $commune)
                                        <tr>
                                            <td>{{ $commune->id }}</td>
                                            <td>{{ $commune->nom_du_commune }}</td>
                                            <td>{{ $commune->moughataa->nom_du_moughataa }}</td>
                                            <td>
                                                <a href="{{ route('communes.edit', $commune->id) }}" class="btn btn-sm btn-info">Modifier</a>
                                                <form action="{{ route('communes.destroy', $commune->id) }}" method="POST" style="display:inline-block;">
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
                                        <th>Nom de Commune</th>
                                        <th>Moughataa</th>
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
