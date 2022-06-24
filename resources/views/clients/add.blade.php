@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Thêm Sản phẩm</h1>
    <form action="" method="post">
        {{-- @if ($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                 @endforeach
            </div>
        @endif --}}
        @error('msg')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm..." value="{{old('product_name')}}">
            @error('product_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="">Giá</label>
            <input type="text" name="product_price" class="form-control" placeholder="Giá sản phẩm..." value="{{old('product_price')}}" >
            @error('product_price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        @csrf
    </form>
@endsection

@section('css')
    
@endsection

@section('js')

@endsection