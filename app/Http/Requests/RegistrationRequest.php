<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name'=>'required|min:6',
            'email'=>'required|email',
            'phone'=>'required|min:10|max:10',
            'date_of_birth'=>'required',
            'password'=>'required|min:6',
        ];
    }


    public function messages()
    {
        return [
            'email.required'=>'Không Được Để Trống Email',
            'email.email'=>'Nhập Sai Định dạng Email',
            'name.required'=>'Không Được Để Trống Name',
            'name.min'=>'không được nhập dưới 6 ký tự',
            'phone.required'=>'Không Được Để Trống Phone',
            'phone.min'=>'không được nhập dưới 10 chữ số',
            'phone.max'=>'không được nhập hơn 10 chữ số',
            'date_of_birth.required'=>'không được bỏ trống ngày sinh',
            'password.required'=>'Không Được Để Trống Password',
            'password.min'=>'không được nhập dưới 6 ký tự'
        ];
    }




}
