@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Wilayas</h3>
                            <a href="{{ route('wilayas.create') }}" class="btn btn-primary float-right">Ajouter une Wilaya</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom de Wilaya</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wilayas as $wilaya)
                                        <tr>
                                            <td>{{ $wilaya->id }}</td>
                                            <td>{{ $wilaya->nom_du_wilaya }}</td>
                                            <td>
                                                <a href="{{ route('wilayas.edit', $wilaya->id) }}" class="btn btn-sm btn-info">Modifier</a>
                                                <form action="{{ route('wilayas.destroy', $wilaya->id) }}" method="POST" style="display:inline-block;">
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
