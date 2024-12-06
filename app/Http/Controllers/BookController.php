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
        $authors = Author::all(); 
        return view('books.create',compact('categories'),compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sumary' => 'required',
            'discription' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,jfif,svg',
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
            'discription' => $request->discription,
            'image' => $filename,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
                ]);
        return redirect()->route('books.index')
            ->with('success', 'Livre ajouté avec succès !');
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
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();
        return view('books.edit', compact('book','categories','authors'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Найти книгу по ID
    $book = Book::findOrFail($id);

    // Валидация данных
    $validatedData = $request->validate([
        'title' => 'required',
        'sumary' => 'required',
        'discription' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif,svg|max:2048',
        'author_id' => 'required',
        'category_id' => 'required',
    ]);

    // Если есть новое изображение, обработать его
    if ($request->hasFile('image')) {
        // Сохранение нового файла изображения
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $filename . '_' . time() . '.' . $extension;

        // Сохранить в папке uploads
        $request->file('image')->storeAs('uploads', $filename);

        // Установить новое имя файла в данные для обновления
        $validatedData['image'] = $filename;
    } else {
        // Если изображения нет, оставить старое
        $validatedData['image'] = $book->image;
    }

    // Обновление книги
    $book->update($validatedData);

    // Перенаправление с сообщением об успехе
    return redirect()->route('books.index')->with('success', 'Книга успешно обновлена!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/books')->with('success', 'Produit supprimé avec succès');
    }
}
