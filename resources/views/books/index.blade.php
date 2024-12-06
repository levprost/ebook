@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des produits</h3>
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
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->discription}}</td>
                                    <td>{{$book->sumary}}</td>
                                    <td>{{$book->q}}</td>
                                    @if($book->image)
                                    <td>
                                        <img src="/storage/uploads/{{$book->image}}" alt="" width="100">
                                    </td>
                                    @endif
                                    <td>{{$book->category->name}}</td>
                                    <td>{{$book->author->first_name}}</td>
                                    <td>
                                        <a href="{{ route('books.edit', $book->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('books.destroy', $book->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
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