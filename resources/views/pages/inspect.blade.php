@extends('layouts.app')

@section('title',$product->title)
@section('description','Подробнее')

@section('content')

    <div class="wrapper">
        <div class="description-site">
            <h1>{{$product->title}}</h1>
            <div class="wrapper-card">

                <div class="inspect-card">
                    <img src="{{asset('storage/image/'.$product->image)}}"  alt="" class="inspect-pic">
                    @auth
                        <button id="addToCart" @if($product_in_cart) disabled @endif>@if($product_in_cart)Уже в корзине @else Заказать @endif</button>
                    @else
                        <a href="{{route('user.indexLogin')}}">Заказать</a>
                    @endauth

                </div>

                <div class="inspect-descr">
                    <span>Стоимость: {{$product->price}} p.</span>
                    <p>{{$product->description}}</p>

                   @if($product->compound!=null)
                        <span>В состав входят:</span>
                        <ul style="list-style: none; max-width: 300px">
                            @foreach($product->compound as $item)
                                <li><a href="{{route('productselse',$item->id)}}">| {{$item->title}} |</a></li>
                            @endforeach
                        </ul>
                       @endif
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        let url = '/cart/add';
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let addBtn = document.querySelector('#addToCart');
        addBtn.addEventListener('click', addToCart);
        function addToCart(){
            addBtn.disabled=true;
            fetch(url, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'post',
                credentials: "same-origin",
                body: JSON.stringify({
                   product_id: '{{$product->id}}',
                    product_type: '{{$product_type}}'
                })
            })
                // .then((data) => {
                //     window.location.href = redirect;
                // })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
