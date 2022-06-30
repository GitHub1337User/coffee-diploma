<div class="card">
    <h1>{{$ingredient->title}}</h1>
    <img src="{{asset('storage/image/'.$ingredient->image)}}" alt="{{$ingredient->description}}">
    <p>{{$ingredient->description}}</p>
    <a href="{{ route('productselse',$ingredient->id) }}">Подробнее</a>
</div>
