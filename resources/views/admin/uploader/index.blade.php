@extends('layouts.cabinet')

@section('content')
    <div class="alert alert-success" role="alert">
        Тут именно товары прайса твоего склада с 1С. Описание в "Товары" .
    </div>
    {{--@include('admin.users._nav')--}}
    <div class="btn-group mt-2 mb-2">
        <form method="get" action="{{route('admin.uploader.index')}}">
            @csrf
            <input type="hidden" id="is_active" name="is_active" value="no">
            <button class="btn btn-info">Деактивированные</button>
        </form>
    </div>
    <div class="btn-group mt-2 mb-2">
        <form method="get" action="{{route('admin.uploader.index')}}">
            @csrf
            <input type="hidden" id="is_active" name="is_active" value="yes">
            <button class="btn btn-danger">Активированные</button>
        </form>
    </div>
    <div class="btn-group mt-2 mb-2">
        <form method="get" action="{{route('admin.margin.price')}}">
            @csrf
            <button class="btn btn-danger">Наценка</button>
        </form>
    </div>
    <div class="card mb-3">
        <div class="card-header"><h2 class="text-center mb-2 border-bottom">Фильтр по товарам</h2></div>
        <div class="card-body">
            {{--<form action="{{route('admin.products.search')}}" method="post">--}}
            <form action="{{route('admin.uploader.index')}}" method="get">
@csrf
                <div class="row">

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="seller" class="col-form-label">Производитель</label>
                            <input id="seller" class="form-control" name="seller" value="{{ request('seller') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="type" class="col-form-label">Группа товара</label>
                            <input id="type" class="form-control" name="type" value="{{ request('type') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="code" class="col-form-label">Код детали</label>
                            <input id="code" class="form-control" name="code" value="{{ request('code') }}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Примечания</label>
                            <input id="name" class="form-control" name="note" value="{{ request('note') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-fuchsia">№</th>
                    <th>ID</th>
                    <th>Производитель</th>
                    <th>Группа товара</th>
                    <th>Код</th>
                    <th>Цена прайс</th>
                    <th>Цена с наценкой</th>
                    <th>Примечение</th>
                    <th>Описание</th>
                    <th>Ceo</th>
                    <th>Картинка</th>
                    <th>Активный</th>
                    <th>Редактировать</th>
                </tr>
                </thead>
                <tbody>
@if($ups)
                @foreach ($ups as $key=>$uploader)
                    <tr>
                        <td class="text-fuchsia">{{ $key }}</td>
                        <td>{{ $uploader->id }}</td>

                        <td>{{ $uploader->seller }}</td>
                        <td>{{ $uploader->type }}</td>
                        <td>
                            {{ $uploader->code }}
                        </td>
                        <td>
                            {{ $uploader->price }}
                        </td>
                        <td>
                            {{ $uploader->margin_price }}
                        </td>
                        <td>
                            {{ $uploader->note }}
                        </td>
                        <td>
                            {{ $uploader->description }}
                        </td>
                        <td>
                            {{ $uploader->meta_search }}
                        </td>
                        <td>
                            {{ $uploader->image_link }}
                        </td>

                        <td>
                            <form method="POST" action="{{ route('admin.uploader.activate', $uploader->id) }}" class="mr-1">
                                @csrf
                                @if ($uploader->isWait())
                                    <button class="btn btn-info">Неактивный</button>
                                @endif
                                @if ($uploader->isActive())
                                    <button class="btn btn-primary">Активный</button>
                                @endif
                            </form>

                        </td>
                        <td>
                            <a href="{{route('admin.uploader.edit', $uploader)}}" class="btn btn-bitbucket">Edit</a>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>

            {{ $ups->appends($_GET)->links() }}
            {{--{{ $ups->appends(Request::all())->links() }}--}}
@endif
@endsection