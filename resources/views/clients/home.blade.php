@extends('layouts.client')

@section('sidebar')
    @parent
    <h3>Home Sidebar</h3>
@endsection

@section('content')
    <h1>Trang chủ</h1>
    {{-- @datetime mà ta đã định nghĩa --}}
    {{-- @datetime("2022-12-15 11:09:30") --}}
    @env('production')
    <p>Môi trường Production</p>
    @elseenv('test')
    <p>Môi trường test</p>
    @else
    <p>Môi trường dev</p>
    @endenv

    <x-alert type="danger" :message="$title"/>

    {{-- <x-inputs.button/>

    <x-forms.button/> --}}

    <p>
        <img src="https://topshare.vn/wp-content/uploads/2021/10/hinh-anh-anime-ngau-loi-1.jpg" alt="">
    </p>

    <p>
        <a href="{{route('download-image').'?image='. public_path('storage/2022-05-23 (1).png')}}" class="btn btn-primary">Download ảnh</a>
    </p>
@endsection

@section('css')
    <style>
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
    
@endsection

@section('js')

@endsection