<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaginfoInsertRequest extends FormRequest
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
     * 自动验证
     *
     * @return array
     */
    public function rules()
    {
        return [
        'title' => 'required|unique:bk_tag_info',
         ];
    }

    //自定义信息
    public function messages()
    {
        return [
         'title.required' => '标签名称必填',
         'title.unique' => '标签名称已存在',
         ];
    }
}
