<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PeopleResource;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $people = People::all();
        if($people)
        {
            return response(PeopleResource::collection($people), 200);
        }
        else
        {
            return response(null, 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $people = People::create($request->all());

        return response(new PeopleResource($people), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(People $people, int $id)
    {
        if(People::find($id))
        {
            return response(People::find($id), 200);
        }
        else
        {
            return response('Nie znaleziono użytkownika o takim id', 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @param int $id
     * @param string $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people, int $id, string $name)
    {
        $ppl = People::find($id);

        $ppl->update(['name' => $name]);

        return response($ppl, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people, int $id)
    {
        $people = People::destroy($id);

        if($people)
        {
            return response('Rekord został usunięty', 204);
        }
        else
        {
            return response('Nie znaleziono użytkownika o takim id', 404);
        }
    }
}
