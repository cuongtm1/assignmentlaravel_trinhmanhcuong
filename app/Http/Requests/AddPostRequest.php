<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
        'category_id'=>'required',
        'title'=>'required|min:6',
        'content'=>'required|min:6',
    ];
}


    
public function messages()
{
    return [
        'category_id.required'=>'Không Được Để Trống Danh Mục',
        'title.required'=>'Không Được Để Trống Tiêu Đề',
        'title.min'=>' Tiêu Đề Không Được Dưới 6 ký tự',
        'content.min'=>' Nội Dung Không Được Dưới 6 ký tự',
        'content.required'=>'Nội Dung Không Được Để Trống nội dung',
    ];
}

}
