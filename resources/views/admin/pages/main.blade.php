@extends('admin.layouts.admin')

@section('title','Главная')

@section('content')



{{----}}
{{----}}{{-- <a href="{{route('admin.ingredients.index')}}"  class="btn btn-primary w-100">Ингредиенты</a>--}}
{{--<a href="{{route('admin.users.index')}}"  class="btn btn-primary col-5">Пользователи</a>--}}
{{----}}
        <div class="container-fluid ">
            <h1>Главная</h1>
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{route('admin.products.index')}}"  class="d-flex flex-direction-column align-items-center btn btn-primary w-100 h-100 p-5">
                        <span  class="w-100">Товары</span>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="row gap-3">
                        <div class="col-lg-12">
                            <a href="{{route('admin.ingredients.index')}}"  class="btn btn-primary w-100 p-5">Ингредиенты</a>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{route('admin.ingredients.index')}}"  class="btn btn-primary w-100 p-5">Заказы</a>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{route('admin.users.index')}}"  class="btn btn-primary w-100 p-5">Пользователи</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
