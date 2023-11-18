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
                <form action="{{route('admin.books.update',$book->id)}}" method="post"
                    enctype="multipart/form-data" class="book">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Name</label>
                                <input class="form-control" name="name" type="text"
                                    value="{{old('name')?? $book->name}}" id="example-text-input">
                                
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

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{old('quantity')?? $book->quantity}}">
                                <div class="mt-2">
                                    <p class="text-danger quantity-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Price</label>
                                <input type="text" class="form-control" name="price" value="{{old('price')?? $book->price}}">
                                <div class="mt-2">
                                    <p class="text-danger price-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Price discount</label>
                                <input type="text" class="form-control" name="price_discount" value="{{old('price_discount')?? $book->price_discount}}">
                                <div class="mt-2">
                                    <p class="text-danger price_discount-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Page</label>
                                <input type="number" class="form-control" name="page" value="{{old('page')?? $book->page}}">
                                <div class="mt-2">
                                    <p class="text-danger page-error error"></p>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Publish_date</label>
                                <input type="date" class="form-control" name="publish_date" value="{{old('publish_date')?? $book->publish_date}}">
                                <div class="mt-2">
                                    <p class="text-danger publish_date-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Trống</option>
                                </select>
                                <div class="mt-2">
                                    <p class="text-danger status-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Type book</label>
                               <select name="typebook_id" class="form-control">
                                <option value="">Trống</option>
                                @foreach ($typebooks as $typebook)
                                <option value="{{$typebook->id}}"
                                    {{old('typebook_id') == $typebook->id || $book->typebook_id == $typebook->id? 'selected' :false}}
                                    >{{$typebook->name}}</option>
                                @endforeach
                               </select>
                                <div class="mt-2">
                                    <p class="text-danger typebook_id-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">author</label>
                                <select name="author_id" class="form-control">
                                    <option value="">Trống</option>
                                    @foreach ($authors as $author)
                                    <option value="{{$author->id}}" 
                                        {{old('author_id') == $author->id || $book->author_id == $author->id? 'selected' :false}}
                                        >{{$author->name}}</option>
                                    @endforeach
                                   </select>
                                <div class="mt-2">
                                    <p class="text-danger author_id-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-form-label">Publisher</label>
                                <select name="publisher_id" class="form-control">
                                <option value="">Trống</option>
                                @foreach ($publishers as $publisher)
                                <option value="{{$publisher->id}}"
                                    {{old('publisher_id') == $publisher->id || $book->publisher_id == $publisher->id? 'selected' :false}}
                                    >{{$publisher->name}}</option>
                                @endforeach
                               </select>
                                <div class="mt-2">
                                    <p class="text-danger publisher_id-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">description</label>
                                <input class="form-control" name="description" type="text"
                                    value="{{old('description')?? $book->description}}" id="example-text-input">
                                <div class="mt-2">
                                    <p class="text-danger description-error error"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-2">
                            <img class="rounded mr-2 mo-mb-2" alt="200x200" style="width: 200px;"
                                src="{{asset('storage/images/'.$book->image)}}" data-holder-rendered="true">
                        </div>

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
            $('.book').on('submit', function(e){
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
                        window.location.href = '{{route('admin.books.index')}}';
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