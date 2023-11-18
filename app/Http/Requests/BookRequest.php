<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:25',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'price_discount' => 'required|numeric',
            'publish_date' => 'required|date_format:Y-m-d',
            'page' => 'required|integer',
            // 'status' => 'required',
            'typebook_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'description' => 'required'
        ];


        if($this->route()->book){
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
            'quantity'=> 'Số lượng',
            'price'=> 'Giá',
            'price_discount'=> 'Giá giảm',
            'publish_date' => 'Ngày xuất bản',
            'page'=> 'Số trang',
            'status' =>'Trạng thái',
            'typebook_id' => 'Loại sách',
            'author_id'=>'Tác giả',
            'publisher_id' =>'Nhà xuất bản',
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
            'numeric'=> ':attribute không phải là số!',
            'integer' => ':attribute không phải là số nguyên!',
            'date_format' => ':attribute không đúng định dạng!',
        ];
    }
}
