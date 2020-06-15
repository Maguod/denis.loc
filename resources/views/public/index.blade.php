@extends('layouts.public')

@section('content')
    <div class="services">
        <div class="container">

            <h3 class="text-center"><a href="{{route('public.main.index')}}" role="note">Категории автотоваров</a></h3>
            <span></span>
            <div class="row mains mt-3">
@if($mains)
                @foreach($mains as $main)
                    <div class="col-xs-6 col-md-4 col-lg-3 card_boxs">
                        <a href="{{route('public.main.show', $main->slug)}}" >
                            <div class="card_box">
                                <div class="img_box">
                                    @if(null !== $main->image)
                                        <img src="/upload/main/{{$main->image}}" alt="{{$main->name}}" >
                                    @else
                                        <img src="https://via.placeholder.com/184/e0e0e0/FFFFFF/?text=..." alt="">
                                    @endif
                                </div>
                                <div class="text ">
                                    <a href="{{route('public.main.show', $main->slug)}}" class="bold" >{{$main->name}}</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
    @endif
            </div>
        </div>
    </div>
    <div class="about">
        <div class=" container">
                    <h3 class="mb-2 text-center"><a href="{{route('public.category.index')}}">Группы автотоваров</a></h3>
                    <span></span>
            @if($cats)
            <div class="row mains mt-3">
                @foreach($cats as $val=>$cat)
                <div class="col-xs-12 col-sm-6 col-md-4 abt-sec span_1_of_4 mb-1">
                        <div class="text">
                            <a href="{{route('public.category.show', $cat->slug)}}" class="bold">{{$cat->name}}</a>
                        </div>
                </div>
               @endforeach
            </div>
            @endif
        </div>
    </div>
    <div class="services">
        <div class="container">
        <h3 class="mb-2 text-center"><a href="{{route('public.seller.index')}}" role="note">Производители</a></h3>
        <span></span>
            <div class=" row">
                @if($sellers)
                @foreach($sellers as $sel)
                <div class="col-400-6 col-xs-6 col-sm-4 service_sec">
                    <div class="text list_2_of_1">
                        <a href="{{route('public.seller.show', $sel->slug)}}" class="strech">{{$sel->name}}</a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">

            <div class="feature_head mb-2">
                <h3 class="text-center"><a href="{{route('public.product.index')}}" role="note">Товары и аксессуары</a></h3>
                <span></span>
            </div>
            <div class="row">
                <table class="table table-bordered table-striped table-media">
                    <thead>
                    <tr>
                        <th>Производитель</th>
                        {{--<th>Группа товара</th>--}}
                        <th>Код</th>
                        <th>Розничная цена</th>
                        <th>Перейти</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->seller }}</td>
                            {{--<td>{{ $product->type }}</td>--}}
                            <td>
                                {{ $product->code }}
                            </td>
                            <td>
                                @if('TYCO' === $product->seller)
                                    {{tycoPrice($product->price)}}
                                @else
                                {{ productPrice($product->price) }}
                                @endif
                            </td>
                            <td>
                                <a href="{{route('public.product.show', $product->slug)}}" class="btn btn-info">Заказать\ вопрос</a>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <div class="auto_sec mt-3">
        <div class="title-main">
            <div class="container">
                <div class="row">
                    <h1 class="text-center mb-4" role="main">Сайт <a href="/">Varvik</a> в одном месте объединил несколько складов и сервисов по поиску и продаже запчастей и товаров для вашего автомобиля.</h1>
                </div>
            </div>
        </div>
        @include('layouts.info.info')
        <div class="container">


            {{--@elseif(route('public.contacts'))--}}
            {{--<h1 class="text-center mb-4">Сайт-каталог <a href="/">Varvik group</a> наши контакты.</h1>--}}


            <div class="auto_sec_grids">
                <div class="col-md-12 auto_sec_left">
                    <img src="/images/pic2.jpg" class="img-responsive" alt="Варвик запчасти" />
                    <p role="note">Мы строим долговременные взаимоотношения с нашими клиентами на взаимовыгодных условиях и придерживаемся таких понятий как отвественность, вежливость, адекватная стоимость запчастей и максимально возможное наличие. И с  этим багажом мы решили выйти на интернет рынок. И будем рады дальше развиватся, расти чтобы радовать вас и помогать вам.</p>
                    <p role="note">У нас вы можете подобрать и купить автозапчастии и аксессуары для авто от 227 изготовителей. Мы продаем запасные части всех лучших марок. К примеру: Peugeot, Renault, Toyota, BMW и многие другие. Приобретайте их у знаменитых изготовителей, и вы получите наиболее качественное изделие. Тут вы сможете отыскать запчасти для авто по интересным ценам.
                    </p>
                </div>

            </div>
        </div>
    </div>

@endsection