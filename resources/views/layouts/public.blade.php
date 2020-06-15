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
        <meta property="og:site_name" content="Варвик. Каталог запчастей" />
        <meta property="og:title" content="Варвик магазин-каталог запчастей."/>
        <meta property="og:description" content="Варвик каталог запчастей. Основное направление - детали двигателя. Обратите внимание на бренд TYCO. У нас вы можете купить детали подвески, подшипники, электрика и другое. Склад запчастей для коммерческой техники с большим ассортиментом и приятными ценами. Эффективный поиск запчасти\детали.">
        {{--<title>Varvik поиск и продажа запчастей.| {{$cat->name}}."/></title>--}}
        <meta property="og:url" content="https://varvik.com.ua" />
        <meta property="og:image" content="/img/logo.png" />

    <meta name="description" content="Варвик каталог запчастей. Основное направление - детали двигателя. Обратите внимание на бренд TYCO. У нас вы можете купить детали подвески, подшипники, электрика и другое. Склад запчастей для коммерческой техники с большим ассортиментом и приятными ценами. Эффективный поиск запчасти\детали.">
        <meta name="keywords" content="Варвик, Varvik, магазин-каталог">

    <title>Варвик магазин-каталог запчастей. Подбор &rArr; Поиск &rArr; Доставка</title>
    @show
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="preload" href="{{ asset('css/public.css') }}" as="style">
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">

    @include('layouts.metrika.google')
</head>
<body class="main">
<div class="header">
    <div class="logo">
        <h2 title="Сайт Varvik">
            <a href="/"><img src="/images/46.png" alt=""/>VARVIK
                {{--<span>--}}
                    {{--GROUP--}}
                {{--</span>--}}
            </a>
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
        <img src="/img/Варвик logo.png" alt="Сайт Varvik" class="logo_img">
    </div>
    @include('layouts.nav.social')
</div>
<div class="search-section">
    @include('layouts.search.search')
</div>
<div class="info">
    <div class="container">
        @if(!route('home'))
        <div class="row ">
            <div class="col-12">

                @section('breadcrumbs')
                    {{Breadcrumbs::render()}}
                @show
            </div>
        </div>
        @endif



        <div class="row">
            <div class="col-xs-12">
                @include('layouts.partials.flash')
            </div>
        </div>

     </div>

</div>

<div class="welcome">
    <div class="container">
        <div class="welcome_sec">
            <div class="col-md-6 welcome_info">
                <h2>Идея нашего интернет магазина.</h2>
                <span></span>
                <h4>Мы имеем богатый опыт подбора и продажи автомобильных запчастей.</h4>
                <p>Наличие собственого склада позволяет нам в короткие сроки осуществлять продажу и доставку запчастей конечному потребителю.
                    Наш ассортимент не ограничивается прайсом сайта, мы можем заказывать и привозить запчасти с наших складов партнеров по всей Украине. Советуем обратить ваше внимание на наш склад запчастей для коммерческой техники с большим ассортиментом и приятными для вас ценами. И само собой можем для вас привезти необходимые запчасти из-за зарубежа (Эмираты, Европа, США, Япония и более близкие короткие по срокам Польша и Россия). </p><p><span class="text-bold text-secondary">Больше Вам не нужно тратить время, силы и нервы - позвольте нам помочь вам. Мы найдем и при необходимсти доставим нужный вам товар, запчасть или аксессуар.</span></p>
                {{--<p></p>--}}
                {{--<a href="about.html" class="hvr-bounce-to-right">Read More</a>--}}
            </div>
            <div class="col-md-6 welcome_pic">
                <h2>Для пользователей сайта</h2>
                <img src="/images/wc.jpg" class="img-responsive" alt="Варвик" />
                {{--<h3>Vestibulum efficitur lacus nulla porttitor lorem luctus.</h3>--}}
                <p>Зная номер детали вы можете сразу найти ее на сайте. Или оставьте заявку - мы перезвоним и уточним детали. Мы всегда открыты к диалогу, сотрудничеству и обслуживанию вас и максимально удовлетворить потребность клиента в качественных автозапчастях по низкой цене.</p>
                <p></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

{{--<div class="auto_sec mt-3">--}}
    {{--<div class="container">--}}

         {{--<span class="mb-3"></span>--}}
        {{--<h1 class="text-center mb-4">Сайт-каталог <a href="/">Varvik group</a> в одном месте объединил несколько складов и сервисов по поиску и продаже автозапчастей и автотоваров.</h1>--}}
        {{--<span class="mb-3"></span>--}}
            {{--@elseif(route('public.contacts'))--}}
            {{--<h1 class="text-center mb-4">Сайт-каталог <a href="/">Varvik group</a> наши контакты.</h1>--}}

        {{--<div class="row row-vin pb-2">--}}
            {{--<div class="col-xs-12 mt-1"><h4 class="mb-1">НАШ МЕНЕДЖЕР ЖДЕТ ВАШЕГО ЗАПРОСА</h4></div>--}}
            {{--<div class="search-body col-xs-12">--}}
                {{--<form action="{{route('public.vinSearch')}}" method="post" class="vin-form" >--}}
                    {{--@csrf--}}
                    {{--<div class="label-search">--}}
                        {{--<input type="text" name="vin" value="{{ request('vin') }}" placeholder="Введите VIN">--}}
                        {{--<input type="tel" name="phone" placeholder="телефон (цифры)" pattern="^[0-9]{10,14}" value="{{ request('phone')}}">--}}
                    {{--</div>--}}

                    {{--<button type="submit" class="btn-search" role="search">Найти</button>--}}

                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="auto_sec_grids">--}}
            {{--<div class="col-md-12 auto_sec_left">--}}
                {{--<img src="images/pic2.jpg" class="img-responsive" alt="" />--}}

                {{--<p>Больше Вам не нужно тратить время, силы и нервы - мы найдем и при необходимсти доставим нужный вам товар, запчасть или аксессуар. Большая база товаров,  как наша так и наших партнеров. Зная номер детали вы можете сразу найти ее на сайте. Еще проще оставить заявку - мы перезвоним и уточним детали. В работе придерживаемся таких понятий как отвественность, вежливость, адекватная стоимость.</p>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

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

