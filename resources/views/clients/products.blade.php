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
    <div class="container">
        <h1>Sản phẩm</h1>
    </div>
    <x-package-alert/>

</section>
@endsection

@section('css')
    
@endsection

@section('js')

@endsection