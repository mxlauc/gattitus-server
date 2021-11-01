<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSimplePublicationCommentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'string|nullable',
            'gif_url' => 'string|nullable|required_if:descripcion,null',
        ];
    }

    public function messages()
    {
        if(app()->getLocale() === 'en'){
            return [
                'gif_url.required_if' => 'Un comentario necesita al menos un gif.',
            ];
        }else{
            return [
                'gif_url.required_if' => 'A comment needs at least an gif.',
            ];
        }
    }
}
