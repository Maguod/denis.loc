@extends('layouts.product')

@section('content')

    <div class="container">
        <div class="row mt-1 mb-3">
            <div class="col-xs-12 mb-3">
                <h1 role="main">Все товары из прайса сайта</h1>
            </div>

        </div>
        <div class="row">
            <table class="table table-bordered table-striped table-media">
                <thead>
                <tr>
                    <th>Производитель</th>
                    <th>Группа товара</th>
                    <th>Код</th>
                    <th>Розничная цена</th>
                    <th>Перейти</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
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
            <p class="col-xs-12 welcome_info mb-3">
                Наличие собственного склада позволяет нам в короткие сроки осуществлять продажу и доставку запчастей конечному потребителю. Кроме того, наш ассортимент намного больше и не ограничивается прайсом сайта, мы можем заказывать и привозить запчасти с наших складов партнеров по всей Украине в кратчайшие сроки. Советуем обратить ваше внимание на наш склад запчастей для коммерческой техники с большим ассортиментом и приятными для вас ценами. И само собой у нас есть возможность для вас привезти необходимые запчасти из-за рубежа (Эмираты, Европа, США, Япония, Корея и более близкие короткие по срокам Польша и Россия). Больше Вам не нужно тратить время, силы и нервы - позвольте нам помочь вам. Мы найдем и при необходимости доставим нужный вам товар, запчасть или аксессуар.
            </p>
        </div>
    </div>
    <div class="container mb-3">
        <div class="row">
            <div class="col-xs-12">
                {{ $products->appends(Request::all())->links() }}
            </div>

        </div>
    </div>

@endsection