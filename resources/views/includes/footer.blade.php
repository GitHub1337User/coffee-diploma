<footer>


    <div class="wrapper">
        <div class="footer-wrap">
            <div class="about">
                <a href='{{route('main')}}' class="logo">BARISTA-CLUB</a>
                <span>Начни свой день с черного кофе</span>
                <span>Лучшее кофе на вынос, а так же доставка ингредиентов</span>
                <span class="laravel">Powered-By-Laravel 9</span>

            </div>
            <div class="menu">
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
            </div>
            <div class="social icons-block">
                <h3>Будь в курсе новостей!</h3>

                <span><a href="">Whatsapp</a><img style="background: white;" src="{{asset('images/whatsapp.png')}}" alt=""></span>

                <span><a href="">Vkontakte</a><img style="background: white;" src="{{asset('images/vk.png')}}" alt=""></span>
                <span><a href="">Telegram</a><img style="border-radius: 50%;background: white;" src="{{asset('images/tele.png')}}" alt=""></span>


            </div>

        </div>
    </div>

</footer>
