@extends('layoutparent.admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.typebooks.update',$typebook->id)}}" method="post"
                    enctype="multipart/form-data" class="typebook">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Name</label>
                                <input class="form-control" name="name" type="text"
                                    value="{{old('name')?? $typebook->name}}" id="example-text-input">
                                
                                <div class="mt-2">
                                    <p class="text-danger name-error error"></p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">image</label>
                                <input type="file" class="form-control" name="image" value="{{old('image')}}">
                                
                                <div class="mt-2">
                                    <p class="text-danger image-error error"></p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">description</label>
                                <input class="form-control" name="description" type="text"
                                    value="{{old('description')?? $typebook->description}}" id="example-text-input">
                                <div class="mt-2">
                                    <p class="text-danger description-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-2">
                            <img class="rounded mr-2 mo-mb-2" alt="200x200" style="width: 200px;"
                                src="{{asset('storage/images/'.$typebook->image)}}" data-holder-rendered="true">
                        </div>

                        <input type="hidden" name="previous_url" value="{{ URL::current() }}">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-gradient-info waves-effect waves-light" >Cập nhật</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div><!-- end col -->
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        
            $('.typebook').on('submit', function(e){
            e.preventDefault();
            // let name = $('input[name="name"]').val().trim();
            // let image = $('input[name="image"]').val();
            // let description = $('input[name="description"]').val().trim();
            // let csrfToken = $(this).find('input[name="_token"]').val();
            let formData = new FormData(this);
            $('.error').text('')
            $.ajax({
                url:$(this).attr('action'),
                type: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    if (response.success) {
                        window.location.href = '{{route('admin.typebooks.index')}}';
                    }
                },
                error: function(error){
                        let responseJSON = error.responseJSON.errors;
                    $('.error').text('');
                    for (const key in responseJSON) {
                        $('.'+key+'-error').text(responseJSON[key][0]);
                    }
                    
                }
            })
        })
    })
</script>
@endsection