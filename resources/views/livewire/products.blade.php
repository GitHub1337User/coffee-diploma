<div>
    <h1>Товары</h1>

    <table class="table table-striped">
    @foreach($categories as $category)
            <button type="button" wire:click="{{$category->eng_name}}" class="btn btn-primary">{{$category->name}}</button>
        @endforeach
        <button type="button" wire:click='add' class="btn btn-primary">+</button>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Категория</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
      @foreach($products as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->title}}</td>
              <td>{{$item->category['name']}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->price}}P.</td>
              <td>


                  <button type="button" wire:click='update({{$item}})' class="btn btn-primary">Edit</button>
                  <button type="button" wire:click='delete({{$item}})' class="btn btn-primary">Del</button>
              </td>
          </tr>

      @endforeach
        </tbody>


    </table>

        {{$products->links()}}

@if($popUp)
    <div class="modal fade show" role="dialog" style="display: block" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$product->exists ? 'Редактировать' : 'Добавить'}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" wire:model.defer="product.category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{($category->name==$product->name) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                            <input  wire:model.defer="product.title" type="text" class="form-control" id="title" placeholder="Наименование" value="{{$product->title ??  ''}}">
                            @error('product.title')
                            <div id="title" class="invalid-feedback">
                               {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea wire:model.defer="product.description"  id="description" class="form-control" >{{$product->description ??  'Описание'}}</textarea>
                            @error('product.description')
                            <div id="description" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input  wire:model.defer="product.price" type="number" class="form-control" id="price" placeholder="Цена" value="{{$product->price ??  ''}}">
                            @error('product.price')
                            <div id="price" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            <label for="formFile" class="form-label">Картинка</label>--}}
{{--                            <input class="form-control" type="file" id="image"  wire:model.defer="image">--}}
{{--                            @error('image')--}}
{{--                            <div id="image" class="invalid-feedback">--}}
{{--                                {{$message}}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                            @if ($image)--}}
{{--                                Photo Preview:--}}
{{--                                <img src="{{ $image->temporaryUrl() }}">--}}

{{--                            @endif--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-secondary">{{$product->exists ? 'Редактировать' : 'Добавить'}}</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
@endif


</div>
