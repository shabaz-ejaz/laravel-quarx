<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ToyService;
use App\Http\Requests\ToyRequest;

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
        return response()->json($toys);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $toys = $this->service->search($request->search);
        return response()->json($toys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ToyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToyRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return response()->json($result);
        }

        return response()->json(['error' => 'Unable to create toy'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toy = $this->service->find($id);
        return response()->json($toy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ToyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ToyRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return response()->json($result);
        }

        return response()->json(['error' => 'Unable to update toy'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return response()->json(['success' => 'Toy was deleted'], 200);
        }

        return response()->json(['error' => 'Unable to delete toy'], 500);
    }
}
