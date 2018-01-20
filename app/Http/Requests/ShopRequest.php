<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShopRequest extends Request
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
            'address' => 'required|max:80',
            'city' => 'required',
            'distract' => 'required',
            'trade' => 'required',
            'shopPhone' => 'required|regex:/^1[34578]\d{9}$/',
            'deliPrice' => 'required',
            'initPrice' => 'required',
            'openTime' => 'required',
            'closeTime' => 'required',
            'delivery' => 'required',
            'notice' => 'required|max:80',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => '店铺地址是必填的',
            'address.max:80'  => '名店铺地址最大为80个字',
            'city.required' => '市是必填的',
            'distract.required' => '区是必填的',
            'trade.required' => '商圈是必填的',
            'shopPhone.required' => '店铺电话是必填的',
            'shopPhone.regex' => '店铺电话格式不正确',
            'deliPrice.required' => '配送费是必填的',
            'initPrice.required' => '起步价是必填的',
            'openTime.required' => '开店时间是必填的',
            'closeTime.required' => '关店时间是必填的',
            'delivery.required' => '配送方式是必填的',
            'notice.required' => '店铺公告是必填的',
        ];
    }
}
