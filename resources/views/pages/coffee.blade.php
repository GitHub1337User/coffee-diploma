@extends('layouts.app')

@section('title','Кофе')
@section('description','Наш ассортимент кофе')


@section('content')


    <section>
        <div class="wrapper">
            <div class="description-site">
                <h1>Кофе</h1>
                <div class="wrapper-card">


                    @foreach($coffees as $coffee)

                        @include('includes.coffeeCard',compact('coffee'))

                    @endforeach

                </div>
                {{--                <a class="watch-all" href="/coffee">Смотреть все>></a>--}}
            </div>
        </div>

    </section>


@endsection
