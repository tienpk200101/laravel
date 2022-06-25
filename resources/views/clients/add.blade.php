@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Thêm Sản phẩm</h1>
    <form action="{{route('post-add')}}" method="post" id="product-form">
        {{-- @if ($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                 @endforeach
            </div>
        @endif --}}
        @if (session('create_at'))
            {{session('create_at')}}
        @endif
        <div class="alert alert-danger text-center msg" style="display: none"></div>
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm..." value="{{old('product_name')}}">
            <span style="color:red;" class="error product_name_error"></span>
        </div>
        
        <div class="mb-3">
            <label for="">Giá</label>
            <input type="text" name="product_price" class="form-control" placeholder="Giá sản phẩm..." value="{{old('product_price')}}" >
            <span style="color:red;" class="error product_price_error"></span>
        </div>

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        @csrf
    </form>
@endsection

@section('css')
    
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#product-form').on('submit', function (e) {
                e.preventDefault();
                
                let productName = $('input[name="product_name"]').val().trim();
                let productPrice = $('input[name="product_price"]').val().trim();
                
                let actionUrl = $(this).attr('action');

                let csrfToken = $(this).find('input[name="_token"]').val();

                $('.error').text('');

                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: {
                        product_name: productName,
                        product_price: productPrice,
                        _token: csrfToken
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {

                        $('msg').show();

                        let responseJson = error.responseJSON.errors;
                        
                        // console.log(responseJson);
                        if(Object.keys(responseJson).length > 0) {
                            $('msg').text(responseJson.msg);

                            for (let key in responseJson) {
                                $('.'+key+'_'+'error').text(responseJson[key][0])
                            }
                        }
                        
                    }
                })
            })
        });
    </script>
@endsection
