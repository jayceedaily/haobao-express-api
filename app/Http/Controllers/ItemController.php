<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Store $store)
    {
        $items = $store->items()
            ->whereNull('parent_id')
            ->where('sell', true)
            ->with(['modifiers.items', 'category'])
            ->latest()
            ->paginate();

        return response($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request, Store $store)
    {
        $item = $store->items()->create($request->validated());

        $item->load(['modifiers.items', 'category']);

        return response([
            'message'   => 'ITEM_CREATED',
            'data'      => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return  response(['data' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());
        $item->load(['modifiers.items', 'category']);

        return response([
            'message' => 'ITEM_UPDATED',
            'data' => $item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Item $item)
    {
        if ($request->user()->cannot('delete', $item)) {
            abort(403, 'NOT_ALLOWED');
        }

        $item->delete();

        return response(null, 204);
    }
}
