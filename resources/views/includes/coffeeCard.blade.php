<div class="card">
    <h1>{{$coffee->title}}</h1>
    <img src="{{asset('storage/image/'.$coffee->image)}}" alt="{{$coffee->description}}">
    <p>{{$coffee->description}}</p>
    <a href="{{ route('products',$coffee->id) }}">Подробнее</a>
</div>
