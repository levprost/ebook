@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des Autheurs</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">discription</th>
                                    <th scope="col">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author)
                                <tr>
                                    <td>{{$author->first_name}}</td>
                                    <td>{{$author->last_name}}</td>
                                    <td>{{$author->nationality}}</td>
                                    @if(Auth::user() && Auth::user()->role === 'admin')
                                    <td>
                                        <a href="{{ route('authors.edit', $author->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('authors.destroy', $author->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection