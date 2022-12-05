<?php

namespace App\Http\Controllers;

use App\Models\Modifier;
use Illuminate\Http\Request;

class ModifierItemController extends Controller
{
    public function index(Request $request, Modifier $modifier)
    {
        $items = $modifier->items()->simplePaginate();

        return response($items);
    }
}
