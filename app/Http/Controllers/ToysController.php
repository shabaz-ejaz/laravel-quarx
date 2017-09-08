<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ToyService;
use App\Http\Requests\ToyCreateRequest;
use App\Http\Requests\ToyUpdateRequest;

class ToysController extends Controller
{
    public function __construct(ToyService $toy_service)
    {
        $this->service = $toy_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $toys = $this->service->paginated();
        return view('toys.index')->with('toys', $toys);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $toys = $this->service->search($request->search);
        return view('toys.index')->with('toys', $toys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ToyCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToyCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('toys.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('toys.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the toy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toy = $this->service->find($id);
        return view('toys.show')->with('toy', $toy);
    }

    /**
     * Show the form for editing the toy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toy = $this->service->find($id);
        return view('toys.edit')->with('toy', $toy);
    }

    /**
     * Update the toys in storage.
     *
     * @param  \Illuminate\Http\ToyUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ToyUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the toys from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('toys.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('toys.index'))->with('message', 'Failed to delete');
    }



    /**
     * The categories that belong to the user.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }


}
