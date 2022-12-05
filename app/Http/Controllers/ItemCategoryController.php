<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemCategoryRequest;
use App\Http\Requests\UpdateItemCategoryRequest;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store)
    {
        $itemCategories = $store->itemCategories()->simplePaginate();

        return response($itemCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemCategoryRequest $request, Store $store)
    {
        if ($request->user->cannot('view', $store)) {
            abort(403, 'NOT_ALLOWED');
        }

        $itemCategory = $store->itemCategories()->create($request->validated());

        return response([
            'message' => 'ITEM_CATEGORY_CREATED',
            'data' => $itemCategory
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCategory $itemCategory)
    {
        return response(['data' => $itemCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemCategoryRequest $request, ItemCategory $itemCategory)
    {
        if ($request->user()->cannot('view', $itemCategory)) {
            abort(403, 'NOT_ALLOWED');
        }

        $itemCategory->update($request->validated());

        return response([
            'message' => 'ITEM_CATEGORY_UPDATED',
            'data' => $itemCategory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCategory $itemCategory)
    {

        $itemCategory->delete();

        return response(['message' => 'ITEM_CATEGORY_DELETED']);
    }
}
