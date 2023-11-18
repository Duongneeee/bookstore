@extends('layoutparent.admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                    <li class="breadcrumb-item active">Publisher</li>
                </ol>
            </div>
            <h4 class="page-title">Publisher</h4>
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
                            <a href="{{route('admin.publishers.create')}}"
                                class="btn btn-gradient-info waves-effect waves-light">Create</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="data-wrapper">
                            @foreach ($publishers as $key => $publisher)
                            <tr>
                                <td>{{$startNumber++}}</td>
                                <td>{{$publisher->name}}</td>
                                <td>{{$publisher->description}}</td>
                                <td>
                                    <form action="{{route('admin.publishers.destroy',$publisher->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('admin.publishers.edit',$publisher->id)}}"
                                            class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <input type="hidden" name="redirect_url" value="{{$publishers->url($currentPage)}}">
                                        <button type="submit" class="btn btn-sm btn-danger form-all"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('parts.admin.custom_paginate',['items' => $publishers])
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