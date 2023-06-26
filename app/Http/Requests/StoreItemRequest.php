<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view', $this->store);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'nullable|numeric',
            'cost' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
            'low_stock_threshold' => 'nullable|numeric',
            'track_stock' => 'nullable|boolean',
            'parent_id' => 'nullable|exists:items,id',
            'category_id' => 'nullable|exists:item_categories,id',
            'modifier_id' => 'nullable|exists:modifiers,id',
        ];
    }
}
