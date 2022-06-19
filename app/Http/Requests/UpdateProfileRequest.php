<?php

namespace App\Http\Requests;

use App\Models\Profile;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Profile $profile)
    {
        return auth()->user()->isOwner($profile);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Profile $profile)
    {
        return [
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string',
            'picture' => 'nullable|image'
        ];
    }
}
