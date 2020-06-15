@extends('layouts.main')

@section('content')
        <div class="content mt-3">
            <div class="container">
                <div class="row mt-1 mb-3">
                    <div class="col-xs-12 mb-3">
                        <h1 role="main">Рубрики автотоваров</h1>
                    </div>

                </div>
                <div class="row pt-3 pb-3">
                    @foreach ($mains as $main)
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
                </div>

            </div>
        </div>

        <div class="container links_box">
            <div class="row">
                <div class="col-xs-12">
                    {{ $mains->links() }}
                </div>
            </div>
        </div>
        <div class="container container-info mb-5">
            <div class="row">
                <div class="col-xs-12 welcome_info">
                    <p>
                        Предоставляем максимально высокий уровень услуг. Мы помогаем покупателям на любом этапе поиска приобретения автотоваров. И готовы содействовать вам в выборе подходящих автозапчастей и дать грамотную профессиональную консультацию по товару и производителям.
                    </p>
                </div>
                <div class="col-xs-12 welcome_info">
                    <p> Консультации по покупке и поиску запчастей и акссесуаров через обратный звонок, по почте. Или вы сами можете нам позвонить. Для вашего удобства справа или слева у вас есть меню для быстрого перехода в социальные мессенджеры.</p>
                    <p>Мы поможем вам с выбором.</p>
                </div>
            </div>
        </div>


@endsection