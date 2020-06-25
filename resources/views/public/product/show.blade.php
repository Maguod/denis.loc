@extends('layouts.product')

@section('seo')
    <meta name="keywords" content="Varvik каталог, деталь {{mb_strtolower($product->code, "UTF-8")}} ">
    <meta name="description" content="Varvik автозапчасти, деталь {{mb_strtolower($product->code, "UTF-8")}}, производитель {{$product->seller}}. Предоставляем грамотную консультацию для покупки и доставки товара {{mb_strtolower($product->code, "UTF-8")}}, доставка по Одессе и Украине, запчасть код {{mb_strtolower($product->code, "UTF-8")}} .">
    {{--@endif--}}
    <title>Varvik каталог. Запчасть {{$product->code}}</title>
@endsection
@section('content')
    {{--@include('layouts.partials.flash')--}}
    <div class="content mb-4">
        <div class="container">
            <div class="content mt-3">
                <div class="container">
                    <div class="row">
                        <div class="card col-xs-12 mb-3">
                            <h1 class="mb-1" role="main">Деталь код - {{$product->code}}</h1>
                            <span></span>
                        </div>

                        @if($product->seller === 'TYCO')
                            <div class="col-xs-12 welcome_info mb-3">
                                <p title="автозапчасти TYCO">Советуем вам обратить внимание на бренд TYCO. Это тайваньский производитель, направленный на европейского потребителя с хорошим качеством и низкой ценой запчастей. В ряде случаев применяющий и использующий на своем конвейере комплектующие именитых и брендовых производителей запчастей.  Продукция делится на два направления DYNAFORCE куда входят прокладки и комплекты прокладок и OPTIFORCE куда входят поршни, гильзы, ГРМ-комплекты, распредвалы, ролики ГРМ и навесного оборудования.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped table-media">
                        <thead>
                            <tr>
                                <th>Производитель</th>
                                <th>Группа товара</th>
                                <th>Код</th>
                                <th>Розничная цена</th>
                                <th>Наличие</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $product->seller }}</td>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->code }}</td>
                                <td>
                                    {{$product->margin_price}}
                                </td>
                                <td>
                                    @if($product->isActive())
                                        <span class="text text-bold text-info">Есть на складе</span>
                                    @else
                                        Товар отсутсвуюет
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row ">
                    <form action="{{route('public.product.send', $product->id)}}" method="post" class="send_form row">
                        @csrf
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="name" class="col-form-label">Ваше имя (*)</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ request('name')}}" required>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="email" class="col-form-label">Ваша почта</label>
                            <input id="email" class="form-control" name="email" value="{{ request('email')}}">
                        </div>
                        <div class="form-group col-xs-12 ">
                            <label for="phone" class="col-form-label">Ваш телефон (цифры) (*)</label>
                            <input id="phone" type="tel" class="form-control" name="phone" value="{{ request('phone')}}"
                                   pattern="^[0-9]{10,12}"
                                   required
                            >
                        </div>
                        <div class="form-group col-xs-12 ">
                            <label for="message" class="col-form-label">Ваш вопрос или комментарий</label>
                            <textarea id="message" class="form-control" name="message" value="{{ request('message') }}"></textarea>
                        </div>
                        <div class="submit-btn">
                            <input type="submit" value="Отправить">
                        </div>
                    </form>
                 </div>
        </div>
    </div>



@endsection