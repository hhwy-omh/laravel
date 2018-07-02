<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistRequest extends FormRequest
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
            'protocol'=>'accepted',  // 注册协议必须勾选
            'password'=>'required|min:6|max:18|confirmed',   // confirmed:   password  和  password_confirmation是否相同
            'face'=>'required | image | max:2048' // 2M=2*1024kb
        ];
    }
}
