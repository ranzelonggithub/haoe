<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FoodRequest extends Request
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
            'goodsName' => 'required|max:20',
            'sort' => 'required',
            'price' => 'required',
            // 'picture' => 'required',
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'goodsName.required' => '名称是必填的',
            'goodsName.max:20'  => '名称最大为20个字',
            'sort.required' => '排序是必填的',
            // 'picture.required' => '图片是必填的',
            'price.required' => '价格是必填的',
            'description.required' => '描述是必填的',
        ];
    }
}
