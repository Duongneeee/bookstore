@extends('layoutparent.admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                    <li class="breadcrumb-item active">Type book</li>
                </ol>
            </div>
            <h4 class="page-title">Type Book</h4>
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
                            <a href="{{route('admin.typebooks.create')}}"
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
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="data-wrapper">
                            @foreach ($typebooks as $key => $typebook)
                            <tr>
                                <td>{{$startNumber++}}</td>
                                <td><img src="{{asset('storage/images/'.$typebook->image)}}" alt=""
                                        class="rounded-circle thumb-sm mr-1"></td>
                                <td>{{$typebook->name}}</td>
                                <td>{{$typebook->description}}</td>
                                <td>
                                    <form action="{{route('admin.typebooks.destroy',$typebook->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('admin.typebooks.edit',$typebook->id)}}"
                                            class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <input type="hidden" name="redirect_url" value="{{$typebooks->url($currentPage)}}">
                                        <button type="submit" class="btn btn-sm btn-danger form-all"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('parts.admin.custom_paginate',['items' => $typebooks])
            </div>
        </div>
    </div><!-- end col -->
</div>
@endsection
@section('js')
{{-- <script>
    $(document).ready(function() {
    // let storagePage=JSON.parse(localStorage.getItem('storagePage')) ||{};
    let debounceTimeout;
    $(document).on('click','.pagination [aria-label="Previous"]',function(e){
            
            e.preventDefault();
            let page = window.location.href.split('page=')[1];  
            let currentPage =$('.pagination .page-number.bg-primary');
            let nextPage = currentPage.closest('li').prev('li').find('.page-number');

            if(page>1){
                debounceTimeout = setTimeout(() => {
                currentPage.removeClass('bg-primary text-light');
                nextPage.addClass('bg-primary text-light');
                page--;
                getData(page);
             }, 300);
            }
        })
        $(document).on('click','.pagination [aria-label="Next"]',function(e){
            e.preventDefault();
            clearTimeout(debounceTimeout)
            
                let page = window.location.href.split('page=')[1];  
            if(page == undefined){
                page=1;
            }
            let lastPage = $('.pagination .page-number').closest('li').last('li').find('.page-number').text();
            let currentPage =$('.pagination .page-number.bg-primary');
            let nextPage = currentPage.closest('li').next('li').find('.page-number');
            if(page<lastPage){
                debounceTimeout = setTimeout(() => {
                currentPage.removeClass('bg-primary text-light');
                nextPage.addClass('bg-primary text-light');
                page++;
                getData(page);
             }, 300);
            }
            
        })

    $(document).on('click','.pagination .page-number',function(e){
        $('.pagination .page-number').removeClass('bg-primary text-light');
        let value = e.target.href;
        // console.log([value]);
        $(this).addClass('bg-primary text-light');
        // createStoragePage('value',value);
            e.preventDefault();
            const page = $(this).attr('href').split('page=')[1];
            getData(page);
        })

    function createStoragePage(key, value){
        storagePage[key] = value;
        // console.log(storagePage);
        localStorage.setItem('storagePage',JSON.stringify(storagePage));
    }

    // Hàm để lấy dữ liệu từ server
    function getData(page) {
        $.ajax({
            url: '?page=' + page,
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                    // Cập nhật nội dung trang hiện tại
                $('.data-wrapper').html(data);
                // Thêm hash vào URL để có thể sử dụng nút "Back" của trình duyệt
                window.location.hash = 'page=' + page;
                // $('.pagination .page-number').removeClass('bg-primary text-light');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', errorThrown);
            }
        });
    }

    // Xử lý khi fragment thay đổi (Back/Forward button)
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#page=', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getData(page);
            }
        }
    });

    // Kiểm tra khi trang được load lại (F5 hoặc Refresh)
    if (window.location.hash) {
        var page = window.location.hash.replace('#page=', '');
        let elements = $('.pagination .page-number')
        for (const key of elements) {
           if(key.href.split('page=')[1] == page){
            key.classList.add('bg-primary','text-light')
           }
        }
        //     // element.addClass('bg-primary text-light');
        // let element = $('.pagination .page-number').attr('href');
        // console.log(element)
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            // storagePage.addClass('bg-primary text-light');
            getData(page);
        }
    }else{
        $('.pagination .page-number')[0].classList.add('bg-primary','text-light');
    }
 
});
</script> --}}
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