<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;

class BooksController extends Controller
{
    public function __construct(BookService $book_service)
    {
        $this->service = $book_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = $this->service->paginated();
        return view('books.index')->with('books', $books);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $books = $this->service->search($request->search);
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BookCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('books.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('books.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->service->find($id);
        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->service->find($id);
        return view('books.edit')->with('book', $book);
    }

    /**
     * Update the books in storage.
     *
     * @param  \Illuminate\Http\BookUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the books from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('books.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('books.index'))->with('message', 'Failed to delete');
    }
}
