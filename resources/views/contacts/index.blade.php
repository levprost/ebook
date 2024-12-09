@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des messages</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <table class="table">
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->message}}</td>
                                    <td>{{$contact->user->name}}</td>
                                    <td>
                                        <form action="{{ route('contacts.destroy', $contact->id)}}" method="POST" style="display: inline-block"> 
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