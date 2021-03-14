<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    // index – Lista os dados da tabela
    // show – Mostra um item específco
    // create – Retorna a View para criar um item da tabela
    // store – Salva o novo item na tabela
    // edit – Retorna a View para edição do dado
    // update – Salva a atualização do dado
    // destroy – Remove o dado

    /**
     * //index – Lista os dados da tabela
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(1);

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create – Retorna a View para criar um item da tabela
        return view('book.create');
    }

    /**
     *  //store – Salva o novo item na tabela
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'autor' => "required | max:250",
                'title' => "required | max:300",
                'numero_serie' => "required | min:13 |max:13 | unique:books",
            ]
        );

        Book::create($request->all());

        return redirect('/book')->with('success', 'livro foi salvo!');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Book;
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book', ['book' => $book]);
    }

    /**
     * //edit – Retorna a View para edição do dado
     *
     * @param  App\Models\Book;
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param App\Models\Book;
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        return redirect()->route('book.index');
    }

    /**
     * //destroy – Remove o dado
     *
     * @param App\Models\Book;
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index');
    }

    public function search(Request $request, Book $books)
    {   

        $querys = $books->search($request->filter);

        return view( 'welcome', compact('querys'));
    }
}
