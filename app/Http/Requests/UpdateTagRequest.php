<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Tag $tag)
    {
        return [
            'name' => 'required|string|max:255|unique:tags,title,except,'.$tag->id,
        ];
    }
}
