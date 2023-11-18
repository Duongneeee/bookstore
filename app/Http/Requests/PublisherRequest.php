<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:25|unique:publishers,name',
            'description' => 'required'
        ];


        if($this->route()->publisher){
            $rules['name'] = 'required|max:25|unique:publishers,name,'.$this->route()->publisher;
        }
        return $rules;
    }

    public function attributes()
    {
        return [ 
            'name' => 'Loại sách',
            'description' => 'Mô tả'
        ];
    }

    public function messages()
    {
        return [
            'required'=> ':attribute không được bỏ trống!',
            'max' => ':attribute chỉ có tối đa :max ký tự!',
            'unique' => ':attribute đã tồn tại!'
        ];
    }
}
