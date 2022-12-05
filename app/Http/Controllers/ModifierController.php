<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Modifier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreModifierRequest;
use App\Http\Requests\UpdateModifierRequest;

class ModifierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Store $store)
    {
        $modifiers = $store->modifiers()->simplePaginate();

        return response($modifiers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModifierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModifierRequest $request, Store $store)
    {
        $modifier = $store->modifiers()->create($request->validated());

        return response([
            'message' => 'MODIFIER_CREATED',
            'data' => $modifier
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modifier  $modifier
     * @return \Illuminate\Http\Response
     */
    public function show(Modifier $modifier)
    {
        return response([
            'data' => $modifier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModifierRequest  $request
     * @param  \App\Models\Modifier  $modifier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModifierRequest $request, Modifier $modifier)
    {
        $modifier->update($request->validated());

        return response([
            'message' => 'MODIFIER_UPDATED',
            'data' => $modifier
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modifier  $modifier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Modifier $modifier)
    {
        if ($request->user()->cannot('delete', $modifier)) {
            abort(403, 'NOT_ALLOWED');
        }

        $modifier->delete();

        return response(null, 204);
    }
}
