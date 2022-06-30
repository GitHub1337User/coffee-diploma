<header>

    <nav id="myTopnav">
        <div class="menuToggle icon">
            <div class="hamburger"></div>
        </div>
        <a href='{{route('main')}}' class="logo">BARISTA-CLUB</a>

        <div class="menu">
            <a href="{{route('buy')}}" style="background: orange  !important"><img style="max-width: 32px" src="{{asset('images/shopping-cart.png')}}" alt="cart"></a>
            <a href="{{route('coffee')}}">Кофе</a>
            <a href="{{route('ingredients')}}">Ингредиенты</a>
            <a href="{{route('aboutus')}}">О нас</a>
            <a href="{{route('personal')}}">

                @auth
                    {{ Auth::user()->name }}
                @else
                    Личный кабинет
                @endauth

            </a>
            @auth
                <a href = "{{route('user.logout')}}"  onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                    Выход</a >
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
            <label id="switch" class="switch">
                <input type="checkbox"  id="slider" class="switchInput">
                <span class="slider round"></span>
            </label>
        </div>

    </nav>
    <div class="header">
        <div>
            <h1>@yield('title')</h1>
            <p>@yield('description')</p>
            <a href="{{route('buy')}}">Купить</a>
        </div>
    </div>

</header>
