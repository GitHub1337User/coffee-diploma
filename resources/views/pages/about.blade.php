@extends('layouts.app')

@section('title',"О нас")
@section('description','О нас')

@section('content')

    <div class="wrapper" style="display: flex; color:grey; justify-content: space-between; flex-flow: row wrap; align-items: center">
        <h1>Как нас найти</h1>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2281.0156904671244!2d61.431753715461596!3d55.13050294728124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c592cd4d5922c9%3A0xb9558412a87abf99!2z0JDQstGA0L7RgNCw!5e0!3m2!1sru!2sru!4v1655981348674!5m2!1sru!2sru"
                width="600"
                height="450"
                style="border:0; width: 100% !important;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">

            </iframe>
        <ul style="list-style: none; margin-top: 50px">
            <li>Телефон: 8-800-555-3535</li>
            <li>Email: barista-club.coffee@gmail.com</li>
            <li>Улица: Джзержинского, 93Б</li>
        </ul>
    </div>
@endsection
