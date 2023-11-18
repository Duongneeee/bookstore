@extends('layoutparent.admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                    <li class="breadcrumb-item active">Book</li>
                </ol>
            </div>
            <h4 class="page-title">Book</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <a href="{{route('admin.books.create')}}"
                                class="btn btn-gradient-info waves-effect waves-light">Create</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                                <th>Giá giảm</th>
                                <th>Ngày XB</th>
                                <th>số trang</th>
                                <th>Loại sách</th>
                                <th>Tác giả</th>
                                <th>Nhà XB</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="data-wrapper">
                            @foreach ($books as $key => $book)
                            <tr>
                                <td>{{$startNumber++}}</td>
                                <td><img src="{{asset('storage/images/'.$book->image)}}" alt=""
                                        class="rounded-circle thumb-sm mr-1"></td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->description}}</td>
                                <td>{{$book->quantity}}</td>
                                <td>{{$book->price}}</td>
                                <td>{{$book->price_discount}}</td>
                                <td>{{$book->publish_date}}</td>
                                <td>{{$book->page}}</td>
                                <td>{{$book->typebook->name}}</td>
                                <td>{{$book->author->name}}</td>
                                <td>{{$book->publisher->name}}</td>
                                <td>
                                    <form action="{{route('admin.books.destroy',$book->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('admin.books.edit',$book->id)}}"
                                            class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <input type="hidden" name="redirect_url" value="{{$books->url($currentPage)}}">
                                        <button type="submit" class="btn btn-sm btn-danger form-all"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('parts.admin.custom_paginate',['items' => $books])
            </div>
        </div>
    </div><!-- end col -->
</div>
@endsection
@section('js')
<script>
    $(document).ready(function()
    {
            let elements = $('.pagination .page-number')
            for (const key of elements) {
              if(key.href == window.location.href){
                 key.classList.add('bg-primary','text-light')
                }
            }    
    })
</script>
@endsection