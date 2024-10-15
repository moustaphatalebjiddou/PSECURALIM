@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Moughataas</h3>
                            <a href="{{ route('moughataas.create') }}" class="btn btn-primary float-right">Ajouter une Moughataa</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom du Moughataa</th>
                                        <th>Wilaya</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($moughataas as $moughataa)
                                        <tr>
                                            <td>{{ $moughataa->id }}</td>
                                            <td>{{ $moughataa->nom_du_moughataa }}</td>
                                            <td>{{ $moughataa->wilaya->nom_du_wilaya }}</td>
                                            <td>
                                                <a href="{{ route('moughataas.edit', $moughataa->id) }}" class="btn btn-sm btn-info">Modifier</a>
                                                <form action="{{ route('moughataas.destroy', $moughataa->id) }}" method="POST" style="display:inline-block;">
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
                                        <th>Nom du Moughataa</th>
                                        <th>Wilaya</th>
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
