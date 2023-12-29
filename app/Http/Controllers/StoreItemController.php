<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;

class StoreItemController extends Controller
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
            ->with(['modifiers.items', 'category'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            })
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
            'message' => 'ITEM_CREATED',
            'data' => $item
        ], 201);
    }
}
