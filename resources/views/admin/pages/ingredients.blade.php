@extends('admin.layouts.admin')

@section('title','Ингредиенты')

@section('content')

    <h1>Товары</h1>
    @if(session('message'))
        <div class="alert alert-success" role="alert">{{session('message')}} </div>
    @endif
    <table class="table table-striped">
{{--        @foreach($categories as $category)--}}
{{--            <a href=""   class="btn btn-primary">{{$category->name}}</a>--}}
{{--        @endforeach--}}
        <a href="{{route('admin.ingredients.create')}}"  class="btn btn-primary">+</a>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->price}}P.</td>
                <td>


                    <a class="btn btn-primary" href="{{route('admin.ingredients.show',$item->id)}}">Подробнее</a>
                    {{--                <a class="btn btn-primary" href="{{route('')}}">Del</a>--}}
                </td>
            </tr>

        @endforeach
        </tbody>


    </table>

    {{$products->links()}}
@endsection
