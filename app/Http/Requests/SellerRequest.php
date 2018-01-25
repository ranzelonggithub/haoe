<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SellerRequest extends Request
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
            'sellerName' => 'required|max:20',
            'phone' => 'required|regex:/^1[34578]\d{9}$/',
            'email' => 'required|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',
        ];
    }

    public function messages()
    {
        return [
            'sellerName.required' => '用户是必填的',
            'sellerName.max:20'  => '用户名大为20个字',
            'phone.required' => '电话是必填的',
            'phone.regex' => '电话格式不正确',
            'email.required' => '邮箱是必填的',
            'email.regex' => '邮箱格式不正确',
          
            
        ];
    }
}
