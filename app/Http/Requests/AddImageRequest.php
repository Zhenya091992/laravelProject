<?php

namespace App\Http\Requests;

use App\Rules\ExistUrl;
use App\Rules\IsImageUrl;
use Illuminate\Foundation\Http\FormRequest;

class AddImageRequest extends FormRequest
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
    public function rules()
    {
        return [
            'urlImage' => ['bail', 'required', 'url', new ExistUrl, new IsImageUrl]
        ];
    }
}
