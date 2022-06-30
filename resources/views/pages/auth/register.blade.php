@extends('layouts.app')

@section('title',"Регистрация")
@section('description','Регистрация')

@section('content')

    <div class="wrapper">
        <form action="{{route('user.create')}}"  method="post" class="auth-card">
            <h4>Регистрация</h4>
            @csrf
            <input type="text" name="name" placeholder="Ваше имя" required @error('name') style="border: 1px solid #FF7F7F "@enderror >
            @error('name')
            <p style="color: #FF7F7F ">
                {{$message}}
            </p>
            @enderror
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
            <input type="password" name="password_confirmation" placeholder="Повторите пароль" required @error('password_confirmation') style="border: 1px solid #FF7F7F "@enderror>
            @error('password_confirmation')
            <p style="color: #FF7F7F ">
                {{$message}}
            </p>
            @enderror
            <a href="{{route('user.indexLogin')}}">Уже есть аккаунт?</a>
            <button type="submit">Регистрация</button>
        </form>
    </div>
@endsection
