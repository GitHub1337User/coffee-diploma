@extends('layouts.app')

@section('title','Начни свой день с черного кофе')
@section('description','Лучшее кофе на вынос, а так же доставка ингредиентов')

@section('content')
    <section>
        <div class="wrapper video-wrap">
            <div class="video-block">
                <video preload="auto" class="video-item" controls autoplay muted loop>
                    <source src="{{asset('images/videos/Coffe-Shop.mp4')}}" type="video/mp4">
                    <source src="{{asset('images/videos/Coffe-Shop.webm')}} " type="video/webm">
                </video>
            </div>
            <div class="description-site">
                <h1>Немного истории</h1>
                <p>
                    Первые две кофейни в мире открылись в Османской империи в 1554 году в Константинополе.
                    В XVII веке появляются первые кофейни за пределами Османской империи. Так, первая кофейня в
                    Италии была открыта в Венеции в 1647 году.
                    Первая кофейня в Англии открылась в 1652 году. В этой стране их называют «университетами пенни» из-за того,
                    что деньги берут и за вход в кофейню, и за чашку кофе. Кофейни быстро завоевали популярность среди торговцев,
                    а позже и среди других слоёв населения. Уже в 1739 году в Лондоне насчитывалось 551 кофейня. Посетителей кофеен,
                    как правило, объединяли некоторые общие интересы, в основном, профессиональные.
                </p>
            </div>
        </div>

    </section>


    <section>
        <div class="wrapper">
            <div class="description-site">
                <h1>Кофе</h1>
                <div class="wrapper-card">
                    @foreach($coffees as $coffee)

                        @include('includes.coffeeCard',compact('coffee'))

                    @endforeach
                </div>
                <a class="watch-all" href="{{route('coffee')}}">Смотреть все>></a>
            </div>
        </div>

    </section>


    <section>
        <div class="wrapper">
            <div class="description-site">
                <h1>Ингредиенты</h1>
                <div class="wrapper-card">


                    @foreach($ingredients as $ingredient)

                        @include('includes.ingredientCard',compact('ingredient'))

                    @endforeach



                </div>
                <a class="watch-all" href="{{route('ingredients')}}">Смотреть все>></a>
            </div>
        </div>

    </section>


@endsection
