@extends('layout')
@section('content')
@if(Auth::user() && Auth::user()->role === 'admin')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Editer un produit</h3>
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
                        <form method="post" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="title" class="form-control"
                                value="{{ $book->title }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="discription" class="form-control"
                                    value="{{ $book->discription }}">
                            </div>
                            <div class="form-group">
                                <label>Sumary</label>
                                <input type="text" name="sumary" class="form-control"
                                    value="{{ $book->sumary }}">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="image" class="form-label">Image du livre</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <select name="category_id" class="custom-select">
                                    <option value=""> --Catégorie-- </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="author_id" class="custom-select">
                                    <option value=""> --Author-- </option>
                                    @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary  rounded-pill shadow-sm">Mettre à jour</button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
     <h1 class="m-3"><strong>Vous n'êtes pas un administrateur</strong></h1>
    @endif
    @endsection