<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $autohors = Author::all(); 
        return view('produits.create',compact('categories'),compact('Authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sumary' => 'required',
            'description' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required',
            'author_id' => 'required', 
        ]);
        $filename = ""; 
        if ($request->hasFile('image')) { 
        // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg" 
          $filenameWithExt = $request->file('image')->getClientOriginalName(); 
          $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
        // On récupère l'extension du fichier, résultat $extension : ".jpg" 
          $extension = $request->file('image')->getClientOriginalExtension(); 
        // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg" 
          $filename = $filenameWithExt. '_' .time().'.'.$extension; 
        // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin 
        ///storage/app 
          $request->file('image')->storeAs('uploads', $filename); 
        } else { 
          $filename = Null; 
        } 
        Book::create([
            'title' => $request->title,
            'sumary' => $request->sumary,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
                ]);
        return redirect()->route('produits.index')
            ->with('success', 'Produit ajouté avec succès !');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
