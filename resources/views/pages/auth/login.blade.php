@extends('layouts.app')

@section('title',"Авторизация")
@section('description','Авторизация')

@section('content')

    <div class="wrapper">
        <form action="{{route('user.login')}}"  method="post" class="auth-card">
            <h4>Авторизация</h4>
            @csrf
            <input type="email" name="email" placeholder="Ваша почта" required @error('email') style="border: 1px solid #FF7F7F "@enderror>
            @error('email')
            <p style="color: #FF7F7F" >
                {{$message}}
            </p>
            @enderror
            <input type="password" name="password" placeholder="Ваш пароль" required @error('password') style="border: 1px solid #FF7F7F "@enderror>
            @error('password')
            <p style="color: #FF7F7F ">
                {{$message}}
            </p>
            @enderror
            @if(session('message'))
                <p style="color: #4fa24f">{{session('message')}} </p>
            @endif
            <a href="{{route('user.index')}}">Еще нет аккаунта?</a>
            <button type="submit">Авторизация</button>
        </form>
    </div>
@endsection
