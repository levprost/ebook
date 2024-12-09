<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'nationality' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,jfif,svg',
            'category_id' => 'required',
            'author_id' => 'required', 
        ]);
        Author::create([
            'firt_name' => $request->first_name,
            'last_name' => $request->last_name,
            'nationality' => $request->nationality,

                ]);
        return redirect()->route('authors.index')
            ->with('success', 'Author ajouté avec succès !');
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
    public function edit(string $id)
    {
        $authors = Author::findOrFail($id);
        return view('authors.edit', compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateAuthor = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'nationality' => 'required',
        ]);
        Author::whereId($id)->update($updateAuthor);
        return redirect()->route('authors.index')->with('success', 'La categorie mis à jour avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
