<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::sortable()->paginate(10);

        //$authors = Author::all();

        return view('author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author;

        $author->name->$request->authorName;
        $author->surname->$request->authorSurname;

        $author->save();

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books = $author->authorBooks;

        return view("author.show", ['author'=>$author, 'books'=>$books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $author->name = $request->authorName;
        $author->surname = $request->authorSurname;

        $author->save();

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $authorBookCount = $author->authorBooks->count(); //suskaiciuoja kiek autorius turi knygu

        if($authorBookCount == 0) { //jeigu suskaiciuoja jog autorius turi 0 knygu
            $author->delete(); // vadinasi autoriu galima istrinti/autoriu leidzia istrinti
        } else {
            return redirect()->route('author.index')->with("error_message", "Autorius turi knygų");
        }

        return redirect()->route('author.index')->with("success_message", "Autorius neturi knygų");
    }
}
