@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>Product Sidebar</h3>
@endsection

@section('content')
<section>
    @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h1>Sản phẩm</h1>

</section>
@endsection

@section('css')
    
@endsection

@section('js')

@endsection