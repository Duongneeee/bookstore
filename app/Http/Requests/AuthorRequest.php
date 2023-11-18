<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required|max:25',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required'
        ];


        if($this->route()->author){
            if($this->image) {
                $rules['image'] = 'image|mimes:jpeg,png,jpg,gif';
            }else{
                unset($rules['image']);
            }
        }
        return $rules;
    }

    public function attributes()
    {
        return [ 
            'name' => 'Loại sách',
            'image' => 'Hình ảnh',
            'description' => 'Mô tả'
        ];
    }

    public function messages()
    {
        return [
            'required'=> ':attribute không được bỏ trống!',
            'max' => ':attribute chỉ có tối đa :max ký tự!',
            'image'=> ':attribute không phải là ảnh!',
            'mimes'=> ':attribute không đúng định dạng!', 
        ];
    }
}
