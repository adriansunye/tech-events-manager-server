<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEventRequest extends FormRequest
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
            'title'=> ['required', 'min:4', 'max:19'],
            'description' => ['required'],
            'expiration_date' => ['required'],
            'location' => ['required'],
            'max_participants' => ['required'],
            'image_path' => ['image',  'mimes:png,jpg,jpeg' , 'max:2048'],
        ];
    }
}
