@extends('layouts.category')

@section('seo')
    {{--<meta property="og:type" content="product"/>--}}
    {{--<meta property="og:locale" content="ru-UA" />--}}
    {{--<meta property="og:site_name" content="Варвик магазин-каталог" />--}}
    {{--<meta property="og:title" content="Varvik поиск и продажа запчастей.| {{$cat->name}}."/>--}}
    {{--<meta property="og:description" content="Варвик запчасти Одесса, детали {{mb_strtolower($cat->name, "UTF-8")}}, {{mb_strtolower($cat->name, "UTF-8")}} автотовары, автозапчасти для иномарок, детали для иномарок, запчасти для авто, поиск и подбор автозапчастей по коду, номеру, запчасти вин, производителю, {{mb_strtolower($cat->name, "UTF-8")}}, доставка Одесса и Украина, автозапчасти Одесса, запчасти Яма">--}}
    {{--<title>Varvik поиск и продажа запчастей.| {{$cat->name}}."/>--}}
    {{--<meta property="og:url" content="'admin.category.show/' . {{$cat->slug}}" />--}}
    {{--<meta property="og:image" content="URL основного фото на Карточке товара" />--}}
    {{--<meta property="og:price:amount" content="Цена товара в текущей валюте" />--}}
    {{--<meta property="og:price:currency" content="Валюта товара в формате ISO 4217" />--}}
    <meta name="description" content="Варвик. У нас вы можете купить {{mb_strtolower($cat->name, "UTF-8")}}, авторынок Куяльник (Яма). Доставка по Одессе и Украине. Большой каталог запчастей, авто и мото деталей. Запчасти для коммерческих авто. Купить {{$cat->name}} Одесса.">
    <title>Магазин-каталог автозапчастей.| {{$cat->name}}.</title>
@endsection
@section('content')
    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="card col-xs-12 mb-3">
                    <h1 class="mb-1" role="main">{{$cat->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mb-3">
        <div class="container">
            <table class="table table-bordered table-striped table-media">
                <thead>
                <tr>
                    <th>Производитель</th>
                    {{--<th>Группа товара</th>--}}
                    <th>Код</th>
                    <th>Розничная цена</th>
                    <th>Подробнее</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $val=>$product)
                    <tr>
                        <td>{{ $product->seller }}</td>
                        <td>
                            {{ $product->code }}
                        </td>
                        <td>
                            {{$product->margin_price}}
                        </td>
                        <td>
                            @if($product->isActive())
                                <a href="{{route('public.product.show', $product->slug)}}" class="btn btn-info">Заказать\ вопрос</a>
                            @else
                                <a href="{{route('public.product.show', $product->slug)}}" class="btn btn-default">Заказать\ вопрос</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection