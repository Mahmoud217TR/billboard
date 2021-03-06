<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertisementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'state' => 'required',
            'category_id' => 'nullable|numeric|exists:categories,id',
            'featured' => 'nullable|boolean',
            'tags' => 'nullable|array|min:0',
            'tags.*'  => "nullable|distinct|numeric|exists:tags,id",
        ];
    }
}
