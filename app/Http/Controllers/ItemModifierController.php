<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemModifierRequest;
use App\Http\Requests\UpdateItemModifierRequest;
use App\Models\ItemModifier;

class ItemModifierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
     * @param  \App\Http\Requests\StoreItemModifierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemModifierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemModifier  $itemModifier
     * @return \Illuminate\Http\Response
     */
    public function show(ItemModifier $itemModifier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemModifier  $itemModifier
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemModifier $itemModifier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemModifierRequest  $request
     * @param  \App\Models\ItemModifier  $itemModifier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemModifierRequest $request, ItemModifier $itemModifier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemModifier  $itemModifier
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemModifier $itemModifier)
    {
        //
    }
}
