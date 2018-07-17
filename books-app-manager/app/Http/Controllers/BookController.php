<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Redirect;
use Session;
use Validator;
use View;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return View::make('books.index')
            ->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title'     => 'required',
            'author'    => 'required|alpha',
            'isbn'      => 'required|numeric|digits:13|unique:books,isbn',
            'published' => 'required|numeric|digits:4|max:2018'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $book = new Book;
            $book->title        = Input::get('title');
            $book->author       = Input::get('author');
            $book->isbn         = Input::get('isbn');
            $book->published    = Input::get('published');
            $book->save();

            Session::flash('message', 'Successfully created books!');
            return Redirect::to('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($title, $uuid)
    {
        // $book = Book::find($uuid);
        $book = Book::where([
            ['title', '=', $title],
            // [DB::raw('substr(CAST(uuid AS varchar(100)), -6)'), '=', $uuid]
        ])->first();
        
        return View::make('books.show')
            ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $book = Book::find($uuid);

        return View::make('books.edit')
            ->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $rules = array(
            'title'     => 'required',
            'author'    => 'required|alpha',
            'isbn'      => 'required|numeric|digits:13|unique:books,isbn',
            'published' => 'required|numeric|digits:4|max:2018'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $book = Book::find($uuid);
            $book->title        = Input::get('title');
            $book->author       = Input::get('author');
            $book->isbn         = Input::get('isbn');
            $book->published    = Input::get('published');
            $book->save();

            Session::flash('message', 'Successfully updated book!');
            return Redirect::to('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $book = Book::find($uuid);
        $book->delete();

        Session::flash('message', 'Successfully deleted the book!');
        return Redirect::to('/');
    }
}
