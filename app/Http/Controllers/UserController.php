<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([ 
            'name' => 'required|max:40',  
          ]); 
            
          $user->update($request->all()); 
     
          return back()->with('message', 'Le compte a bien été modifié.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) { 
            $user->delete(); 
            return redirect()->route('home')->with('message', 'Le compte a bien été supprimé'); 
        } else { 
         return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible']);
        }
    }
}
