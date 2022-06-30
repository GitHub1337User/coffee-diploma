@extends('layouts.app')

@section('title',"Корзина")
@section('description','Корзина')

@section('content')

    <div class="wrapper">
        @if($products!=null || $ingredients!=null)
            <h1 style="text-align: center; color: white">Всего: {{$full_price}} р.</h1>
            <div class="cart">
                @if($products!=null)
             @foreach($products as $item)
                    <div class="cart-element">
                        <h1>{{$item->title}}</h1>
                        <img src="{{asset('storage/image/'.$item->image)}}" alt="{{$item->description}}">
                        <p>{{$item->price}}р.</p>
                        <div class="control-cart">
                            <button class="minus-cart">&mdash;</button>
                            <span class="count-cart">1</span>
                            <input class="count-cart" value="1" type="number" name="count" hidden>
                            <button class="plus-cart">&#10010;</button>
                            <button class="delete-cart">&#10006;</button>
                        </div>
                    </div>

                @endforeach
                @endif
                @if($ingredients!=null)
                 @foreach($ingredients as $item)
                     <div class="cart-element">
                         <h1>{{$item->title}}</h1>
                         <img src="{{asset('storage/image/'.$item->image)}}" alt="{{$item->description}}">
                         <p>{{$item->price}}р.</p>
                         <div class="control-cart">
                             <button class="minus-cart">&mdash;</button>
                             <span class="count-cart">1</span>
                             <button class="plus-cart">&#10010;</button>
                             <button class="delete-cart">&#10006;</button>
                         </div>
                     </div>
                 @endforeach
                    @endif
            </div>

            <h1 style="text-align: center; color: white">Оформление заказа</h1>
            <form action="{{route('order.store')}}"  method="post" class="auth-card">
                @csrf
                <input type="text" name="address" placeholder="Введите адрес доставки" required @error('address') style="border: 1px solid #FF7F7F "@enderror>
                @error('address')
                <p style="color: #FF7F7F" >
                    {{$message}}
                </p>
                @enderror
                <textarea  name="comments" style='width: 90%; height: 100px; resize: none; padding: 15px;' placeholder="Ваш пароль"  @error('comments') style="border: 1px solid #FF7F7F "@enderror> </textarea>
                @error('comments')
                <p style="color: #FF7F7F ">
                    {{$message}}
                </p>
                @enderror

                <button type="submit">Оформить</button>
            </form>

        @else
            <h1 style="text-align: center; color: white">Корзина пуста</h1>
            @endif
    </div>



@endsection
