@extends('admin.layouts.admin')

@section('title','Товары')

@section('content')

    <h1>{{$product->title}} -> Подробнее</h1>
    @if(session('message'))
        <div class="alert alert-success" role="alert">{{session('message')}} </div>
    @endif
    <form action="{{route('admin.products.destroy',$product->id)}}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="confirm('Вы уверены?')" class="btn btn-danger">Удалить</button>
    </form>
    <form action="{{route('admin.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
        <img class="img-thumbnail" style="max-width: 300px !important;" src="{{asset('storage/image/'.$product->image)}}" alt="Pic" >

        @csrf
        @method('PATCH')
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example"  name="category_id" >
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{($category->id==$product->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <input  name="title" type="text" class="form-control" id="title" placeholder="Наименование" value="{{$product->title ??  ''}}" @error('title') style="border: 1px solid #FF7F7F "@enderror>
            @error('title')
            <p style="color: #FF7F7F ">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <textarea name="description"  id="description" class="form-control" @error('description') style="border: 1px solid #FF7F7F "@enderror>{{$product->description ??  'Описание'}}</textarea>
            @error('description')
            <p style="color: #FF7F7F ">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <input  name="price" type="number" class="form-control" id="price" placeholder="Цена" value="{{$product->price ??  ''}}" @error('price') style="border: 1px solid #FF7F7F "@enderror>
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
        <div class="mb-3">
            <h4>Рецепт</h4>
            <p>*При выборе новых компонентов, предыдущий рецепт будет удален</p>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach($ingredients as $item)
                    <input type="checkbox" class="btn-check" id="btncheck{{$item->id}}"  value="{{$item->id}}" autocomplete="off" name="components[]">
                    <label class="btn btn-outline-primary" for="btncheck{{$item->id}}">{{$item->title}}</label>
                @endforeach
                    <input type="checkbox" class="btn-check" id="deleteCompound"  value="deleteCompound" autocomplete="off" name="components[]">
                    <label class="btn btn-outline-danger" for="deleteCompound">Удалить рецепт</label>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary">Редактировать</button>

            <h4>Текущий рецепт</h4>
            <ul class="list-group">
               @foreach($product->compound as $item)
                    <li class="list-group-item">{{$item->title}}</li>
                @endforeach
            </ul>

    </form>
@endsection
