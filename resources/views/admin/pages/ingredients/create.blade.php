@extends('admin.layouts.admin')

@section('title','Ингредиенты')

@section('content')

    <h1>Ингредиенты -> Добавление</h1>
    @if(session('message'))
        <div class="alert alert-success" role="alert">{{session('message')}} </div>
    @endif

    <form action="{{route('admin.ingredients.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input  name="title" type="text" class="form-control" id="title" placeholder="Наименование" value="{{old('title')}}" @error('title') style="border: 1px solid #FF7F7F "@enderror>
            @error('title')
            <p style="color: #FF7F7F ">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <textarea name="description"  id="description" class="form-control" @error('description') style="border: 1px solid #FF7F7F "@enderror> {{old('description')}} </textarea>
            @error('description')
            <p style="color: #FF7F7F ">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <input  name="price" type="number" class="form-control" id="price" placeholder="Цена"  value="{{old('price')}}" @error('price') style="border: 1px solid #FF7F7F "@enderror>
            @error('price')
            <p style="color: #FF7F7F ">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Картинка</label>
            <input class="form-control" type="file" id="image"  name="image" @error('image') style="border: 1px solid #FF7F7F "@enderror>
            @error('image')
            <div style="color: #FF7F7F ">
                {{$message}}
            </div>
            @enderror


        </div>
        <button type="submit" class="btn btn-secondary">Добавить</button>

    </form>
@endsection
