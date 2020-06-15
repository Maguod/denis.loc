<ul class="nav navbar-nav" role="navigation">
    <li ><a href="/">Главная</a></li>
    {{--<li><a href="">Услуги</a></li>--}}
    <li><a href="{{route('public.product.index')}}">Прайс</a></li>
    <li><a href="{{route('public.seller.index')}}">Производители</a></li>
    <li><a href="{{route('public.main.index')}}">Группы товаров</a></li>
    <li><a href="{{route('public.contacts')}}">Контакты</a></li>
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>

    @else
        @if(Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home') }}">Админка</a>
            </li>
        @endif

        <li class="nav-item">

            <a  class="nav-link" href="#" role="button" >
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
                <button type="submit" value="Logout">Logout</button>
            </form>
        </li>
    @endguest
</ul>