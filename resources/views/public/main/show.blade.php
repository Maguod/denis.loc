@extends('layouts.main')

@section('seo')
    <meta name="keywords" content="Varvik магазин-каталог автотоваров,  {{mb_strtolower($main->name, 'UTF-8')}} ">
    <meta name="description" content="Varvik продажа запчастей, Варвик автозапчасти Одесса, купить {{mb_strtolower($main->name, 'UTF-8')}},  запчасти для авто, {{mb_strtolower($main->name, 'UTF-8')}} детали, автозапчасти для иномарок, детали для иномарок, запчасти Яма, поиск и подбор автозапчастей по коду, номеру, производителю, {{mb_strtolower($main->name, 'UTF-8')}}, поиск по vin, доставка Одесса и Украина.">
    <title>Varvik магазин-каталог запчастей и автотоваров. {{$main->name}}</title>
@endsection
@section('content')
    <div class="content mt-3">
        <div class="container">
            <div class="row">
                <div class="card col-xs-12 mb-3">
                    <h1 class="mb-1" role="main">{{$main->name}}</h1>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    @if(!$main->categories->isEmpty()))

    <div class="content mt-3 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <h3 class="text-center">Группы товаров</h3>
                </div>
            </div>   
            <ul class="flex-list">
                @foreach($main->categories as $cat)
                <li>
                    <a href="{{route('public.category.show', $cat->slug)}}" class="bold">{{$cat->name}}</a>
                </li>
                @endforeach
            </ul>
                
       </div>
    </div>
@endif
    @if(!$main->childrenActive->isEmpty()))
    <div class="content mt-3 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <h3 class="text-center">Подрубрики</h3>
                </div>
                @foreach($main->childrenActive as $child)
                <div class="card col-xs-6 col-md-4 mb-4">
                    <h4 class="mb-1 "><a href="{{route('public.main.show', $child->slug)}}" class="btn btn-success">{{$child->name}}</a></h4>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endif

    <div class="content mb-3">
        <div class="container">
            <div class="row">
            <div class="col-xs-12 mb-3">
                <h3 class="text-center">Товары</h3>
            </div>
            @if(!empty($products))
            <div class="col-xs-12">
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
                            @if('TYCO' === $product->seller)
                                {{tycoPrice($product->price)}}
                            @else
                                {{ productPrice($product->price) }}
                            @endif
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
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {{ $products->links() }}
            </div>
            @else
                <h4>Деталей не найдено</h4>
            @endif
        </div>
    </div>
    </div>
@endsection