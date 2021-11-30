<?php

namespace App\Http\Controllers;

use App\Book;

use App\Author;

use Illuminate\Http\Request;

use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookAuthor = $request->bookAuthor;

        $authors = Author::all();

        $bookTitle = $request->bookTitle;

        $filterBooks = Book::all();

        if($bookTitle) {
            $books = Book::sortable()->where('title', $bookTitle)->paginate(10);

        } else if ($bookAuthor) {
            $books = Book::sortable()->where('author_id', $bookAuthor)->paginate(10);

        }else {
            $books = Book::sortable()->paginate(10);
        }

        // $books = Book::all();

        return view('book.index', ['books' => $books, 'authors' => $authors, 'filterBooks' => $filterBooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //autoriaus pasirinkimas is seleccto, atvaizduos visus autorius selecte
        $authors = Author::all();

        return view("book.create", ["authors" => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;

        $book->title = $request->bookTitle;
        $book->isbn = $request->bookIsbn;
        $book->pages = $request->bookPages;
        $book->about = $request->bookAbout;
        $book->author_id = $request->bookAuthor;

        $book->save();

        return redirect()->route("book.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view("book.show", ["book" => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view("book.edit", ["book" => $book, "authors" => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->bookTitle;
        $book->isbn = $request->bookIsbn;
        $book->pages = $request->bookPages;
        $book->about = $request->bookAbout;
        $book->author_id = $request->bookAuthor;

        $book->save();

        return redirect()->route("book.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route("book.index");
    }

    public function generateStatisticsPdf()
    {
        $books = Book::all();

        $authors = Author::all();
        $authorsCount = $authors->count();
        $booksCount = $books->count();

        view()->share(["booksCount" => $booksCount, "authorsCount" => $authorsCount]);
        $pdf = PDF::loadView('pdf_template');

        return $pdf->download("statistics.pdf");
    }
}
