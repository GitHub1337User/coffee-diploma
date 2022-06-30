@extends('admin.layouts.admin')

@section('title','Пользователи')

@section('content')

    <h1>Пользователи</h1>
    @if(session('message'))
        <div class="alert alert-success" role="alert">{{session('message')}} </div>
    @endif
    <table class="table table-striped">

{{--        <a href="{{route('admin.ingredients.create')}}"  class="btn btn-primary">+</a>--}}
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Роль</th>
{{--            <th scope="col">Действия</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($users as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role['name']}}</td>
{{--                <td>--}}


{{--                    <a class="btn btn-primary" href="{{route('admin.ingredients.show',$item->id)}}">Подробнее</a>--}}
{{--                </td>--}}
            </tr>

        @endforeach
        </tbody>


    </table>

    {{$users->links()}}
@endsection
