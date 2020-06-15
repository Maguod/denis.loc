<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @section('seo')
        <meta property="og:type" content="website"/>
        <meta property="og:locale" content="ru-UA" />
        <meta property="og:site_name" content="Варвик. Наш прайс запчастей" />
        <meta property="og:title" content="Варвик магазин-каталог запчастей."/>
        <meta property="og:description" content="Варвик каталог запчастей и аксессуаров. Основное направление - детали двигателя. У нас вы найдете  детали для ДВС от крупных головок блока цилиндра, маслонасосов, помп, поршней до мелких расходников, маслосъёмных колпачков и всяких мелких прокладок, сальников от моторных и клапанов до гидравлических сальников рулевых реек, насосов гидроусилителя под давление, сальников на КПП.">
        {{--<title>Varvik поиск и продажа запчастей.| {{$cat->name}}."/></title>--}}
        <meta property="og:url" content="https://varvik.com.ua/product" />
        <meta property="og:image" content="/img/logo.png" />
    
        <meta name="description" content="Варвик каталог запчастей и аксессуаров. Основное направление - детали двигателя. У нас вы найдете  детали для ДВС от крупных головок блока цилиндра, маслонасосов, помп, поршней до мелких расходников, маслосъёмных колпачков и всяких мелких прокладок, сальников от моторных и клапанов до гидравлических сальников рулевых реек, насосов гидроусилителя под давление, сальников на КПП и сальников ступиц.">
        <title>Варвик. Наш прайс запчастей.</title>
    @show

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">

    <link href="{{ asset('css/public.css') }}" rel="stylesheet">

    @include('layouts.metrika.google')
</head>
<body class="main">
<div class="header">
    <div class="logo">
        <h2 title="Сайт Varvik">
            <a href="/"><img src="/images/46.png" alt="Varvik"/>VARVIK</a>
        </h2>
    </div>

    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
            </button>
        </div>
        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">

            @include('layouts.nav.top')

        </div>
    </nav>
</div>
<div class="banner" style="background-image: url(/images/banner02.jpg);">
    <div class="banner-dott">
        <div class="container-fluid">

            <div id="top" class="callbacks_container">
                <ul class="rslides" id="slider3" role="main">
                    <li>
                        <div class="banner-info">
                            <h3 title="info">У нас вы можете купить любые автозапчасти</h3>
                            <p>Наш ассортимент больше и не ограничивается прайсом сайта</p>
                        </div>
                    </li>
                    <li>
                        <div class="banner-info">
                            <h3 title="info">Мы можем найти автотовары по всей Украине</h3>
                            <p>Только задавая вопросы вы можете получить ответ</p>
                        </div>
                    </li>
                    <li>
                        <div class="banner-info">
                            <h3 title="info">Возможна доставка по территории Украины</h3>
                            <p>При необходимости обеспечим доставку в кратчайшие сроки</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @include('layouts.nav.social')
</div>
<div class="search-section">
    @include('layouts.search.search')
</div>
<div class="info">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                @section('breadcrumbs')
                {{Breadcrumbs::render()}}
                @show
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                @include('layouts.partials.flash')
            </div>
        </div>
    </div>
</div>

@yield('content')

<div class="footer2">
    <div class="container">
        <div class="ftr2-grids">
            <div class="col-md-4 ftr2-grid1">
                <h3>Меню сайта</h3>
                @include('layouts.nav.footer')
            </div>
            <div class="col-md-4 ftr2-grid2">
                <h3>Контакты и связь</h3>
                <div class="ftr2-grid">
                    <p>067-481-77-94 </p>
                    <p class="text-bold">VIBER-TELEGRAM-WHATSAPP</p>
                    {{--<a href="#">1 Hour ago</a>--}}
                </div>
                <div class="ftr2-grid">
                    <p>063-784-37-93 </p>
                    <p class="text-bold">VIBER-TELEGRAM-WHATSAPP</p>
                </div>
            </div>
            <div class="col-md-4 ftr6-grid3">
                <h3>Адрес:</h3>
                <p class="mb-2">Одесская область г. Одесса  ул. Жевахова Гора 1а,
                    Авторинок "Куяльник" (Яма) магазин №642</p>
                <h5 class="text-bold text-white"> График работы магазина:</h5>
                <p> Вт-Сб: 9-00 до 16-00</p>
                <p> ВС: 9-30 до 15-00</p>
                <p>  Пн: Выходной</p>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-8 ftr2-bottom">
        <p>Copyright &copy; 2019 <span>MaxGurtovoi</span> | Design by <a href="http://w3layouts.com"> W3layouts</a></p>
    </div>
</div>
@include('layouts.scripts.script')


</body>

</html>

