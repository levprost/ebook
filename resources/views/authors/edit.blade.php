@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Editer un auther</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->
                        <form method="post" action="{{ route('authors.update', $authors->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $authors->first_name }}">
                            </div>
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $authors->last_name }}">
                            </div>
                            <div class="form-group">
                                <label>Nationalité</label>
                                <input type="text" name="nationality" class="form-control" value="{{ $authors->nationality }}">
                            </div>
                            <button type="submit" class="btn btn-primary  rounded-pill shadow-sm">Mettre à jour</button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection