<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CpassRequest extends Request
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
            'pass' => 'required|regex:/^\w{8,16}$/',
            'repass' => 'required|same:pass',
        ];
    }

     public function messages()
    {
        return [
            'pass.required' => '密码是必填的',
            'pass.regex' => '密码格式不正确',
            'repass.required' => '确认密码是必填的',
            'repass.same' => '确认密码与原密码不一致',
            
        ];
    }
}
