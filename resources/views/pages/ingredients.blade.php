@extends('layouts.app')

@section('title','Ингредиенты')
@section('description','Наш ассортимент ингредиентов')


@section('content')


    <section>
        <div class="wrapper">
            <div class="description-site">
                <h1>Ингредиенты</h1>
                <div class="wrapper-card">

                    @foreach($ingredients as $ingredient)

                        @include('includes.ingredientCard',compact('ingredient'))

                    @endforeach
                </div>
                {{--                <a class="watch-all" href="/ingredients">Смотреть все>></a>--}}
            </div>
        </div>

    </section>


@endsection
