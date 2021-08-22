<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmojiRequest extends FormRequest
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
            //
            'emoji_shape' => 'required',
            'emoji_name' => 'required|max:255',
            'emoji_weight'=>'between:-10,10'
        ];
    }
//    public function messages()
//    {
//        return [
//            'name.required' => __('The user name is required.'),
//            'name.string' => __('The user name must be a string.'),
//            'name.min' => __('The user name must be at least three characters.'),
//            'name.max' => __('The user name may not be greater than 255 characters.'),
//        ];
}
