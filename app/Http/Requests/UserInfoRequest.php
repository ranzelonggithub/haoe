<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserInfoRequest extends Request
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
            // 'username' => 'required|unique:users|regex:/^[a-z]{1}[a-zA-Z0-9]{5,17}$/',
            // 'password' => 'required|regex:/^[a-zA-Z0-9]{6,18}$/',
            'repass' => 'required|same:passWord',
            // 'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
            //'age' => 'required|regex:/^[1-9]{1}[0-9]{0,1}$/',
            //'sex' => 'required',
            'userName'=>'required',
            'passWord'=>'required',
            'repass'=>'required',
            //'phone'=>'require',
            // 'email'=>'require',
        ];
    }

    /**
     * 自定义错误信息
     */
    public function messages()
    {
        return [
            'userName.required'=>'用户名必填',
            'userName.unique'=>'用户名必须唯一',
            //'username.regex'=>'用户名格式错误',
            'passWord.required'=>'密码必填',
            //'password.regex'=>'密码格式错误',
            'repass.required'=>'确认密码必填',
            'repass.same'=>'密码不一致',
            // 'phone.required'=>'手机号必填',
            // //'phone.regex'=>'手机号格式不正确',
            // 'age.required'=>'年龄必填',
            // 'age.regex'=>'年龄格式不正确',
            // 'sex.required'=>'性别必填',
        ];
    }
}
