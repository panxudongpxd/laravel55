<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StalkInsertRequest extends FormRequest
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
     * 标签管理自动验证
     *
     * @return array
     */
    public function rules()
    {
        return [
        'sstitle' => 'required|unique:bk_stalk',
        'ssinfo' => 'required',
         ];
    }

    //自定义信息
    public function messages()
    {
        return [
         'sstitle.required' => '标题必填',
         'sstitle.unique' => '标题已重复',
         'ssinfo.required' => '标签内容必填',
         ];
    }
}
