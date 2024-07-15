@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ajouter Utilisateur</h5>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ URL::to('/update-user/'.$edit->id) }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Entrer le Nom" value="{{ $edit->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Entrer l'Email" value="{{ $edit->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Mot de Passe</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" placeholder="Entrer le Mot de Passe" value="{{ $edit->password }}">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="role" class="col-sm-2 col-form-label">User Role Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="role" id="exampleFormControlSelect" required>
                                        <option value="Admin" {{ 'Admin' == $edit->role ? 'selected' :  ''}}>Admin</option>
                                        <option value="Animateur" {{ 'Animateur' == $edit->role ? 'selected' :  ''}}>Animateur</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Entrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
