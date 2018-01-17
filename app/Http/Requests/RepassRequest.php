<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RepassRequest extends Request
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
            'oldPass' => 'required|regex:/^\w{8,16}$/',
            'newPass' => 'required|regex:/^\w{8,16}$/',
            'rePass' => 'required|same:newPass',
        ];
    }

    public function messages()
    {
        return [
            'oldPass.required' => '原密码是必填的',
            'oldPass.regex' => '原密码格式不正确',
            'newPass.required' => '新密码是必填的',
            'newPass.regex' => '新密码格式不正确',
            'rePass.required' => '确认密码是必填的',
            'rePass.same' => '确认密码与新密码不一致',
        ];
    }
}
