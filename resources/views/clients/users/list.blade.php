@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
<section>
    @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h1>{{$title}}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th width="15%">Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($users))
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                @endforeach
            @else 
                    <tr>
                        <td colspan="4">Không có người dùng</td>
                    </tr>
            @endif
            
        </tbody>
    </table>
</section>
@endsection