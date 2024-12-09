@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <h3 class="mb-4">Liste des Livres</h3>

                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($books as $book)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            @if($book->image)
                            <img src="/storage/uploads/{{$book->image}}" class="card-img-top" alt="Image de {{ $book->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <p class="card-text"><strong>Catégorie:</strong> {{ $book->category->name }}</p>
                                <p class="card-text"><strong>Auteur:</strong> {{ $book->author->first_name }}</p>
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($book->discription, 100) }}</p>
                                <p class="card-text"><strong>Description:</strong> {{ $book->sumary }}</p>
                            </div>
                            @if(Auth::user() && Auth::user()->role === 'admin')
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('books.edit', $book->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                <form action="{{ route('books.destroy', $book->id)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($books->isEmpty())
                <p class="text-center mt-4">Aucun produit trouvé.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection