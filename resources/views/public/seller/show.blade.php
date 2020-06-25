@extends('layouts.seller')

@section('seo')
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="ru-UA" />
    <meta property="og:site_name" content="Варвик. Каталог запчастей" />
    <meta property="og:title" content="Варвик | Запчасти производителя {{$seller->name}}."/>
    <meta property="og:description" content="Варвик. Купить запчасти {{$seller->name}} по доступным ценам. Обеспечим доставку по Одессе и Украине. Предоставляем бесплатную консультацию по запчастям от {{$seller->name}}. Наличие собственного склада позволяет нам в короткие сроки осуществлять продажу и доставку запчастей конечному потребителю. Производитель {{$seller->name}}.">
    {{--<title>Varvik поиск и продажа запчастей.| {{$cat->name}}."/></title>--}}
    <meta property="og:url" content="https://varvik.com.ua/seller/show/{{$seller->slug}}" />
    <meta property="og:image" content="/img/logo.png" />
    @if($seller->name === 'TYCO')
        <meta name="description" content="Варвик. Заказать и купить запчасти TYCO. Хорошее качество и приятная цена. Продукция делится на два направления DYNAFORCE это прокладки и комплекты прокладок и OPTIFORCE это поршни, гильзы, ГРМ-комплекты, распредвалы, ролики ГРМ и навесного оборудования. Запчасти TYCO Одесса Украина.">
        @else
    <meta name="description" content="Варвик. У нас можно купить запчасти {{$seller->name}} по доступным ценам. Обеспечим доставку по Одессе и Украине. Предоставляем бесплатную квалифицированную консультацию по запчастям от {{$seller->name}}. Наличие собственного склада позволяет нам в короткие сроки осуществлять продажу и доставку запчастей конечному потребителю. Производитель {{$seller->name}}.">
    @endif
    <title>Варвик | Запчасти производителя {{$seller->name}}.</title>

@endsection
@section('content')
    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="card col-xs-12 mb-3">
                    <h1 class="mb-1" role="main">Производитель - {{$seller->name}}</h1>
                </div>
                @if($seller->name === 'TYCO')
                <div class="col-xs-12 welcome_info mb-4">
                    <p title="автозапчасти TYCO">Советуем вам обратить внимание на бренд TYCO. Это тайваньский производитель, направленный на европейского потребителя с хорошим качеством и низкой ценой запчастей. В ряде случаев применяющий и использующий на своем конвейере комплектующие именитых и брендовых производителей запчастей.  Продукция делится на два направления DYNAFORCE куда входят прокладки и комплекты прокладок и OPTIFORCE куда входят поршни, гильзы, ГРМ-комплекты, распредвалы, ролики ГРМ и навесного оборудования.</p>
                </div>
               @endif
            </div>
        </div>
    </div>

    <div class="content mb-3">
        <div class="container">
            <table class="table table-bordered table-striped table-media">
                <thead>
                <tr>

                    <th>Производитель</th>
                    <th>Группа товара</th>
                    <th>Код</th>
                    <th>Розничная цена</th>
                    <th>Подробнее</th>

                </tr>
                </thead>
                <tbody>

                @foreach ($products as $val=>$product)
                    <tr>

                        <td>{{ $product->seller }}</td>
                        <td>{{ $product->type }}</td>
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