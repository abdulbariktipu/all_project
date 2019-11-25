<?php
//  php artisan make:request Contact_Mail
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contact_Mail extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // added true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { // added
        return [
            'name'=>'required|min:3',
            'email'=>'required',
            'message'=>'required'
        ];
    }
}
