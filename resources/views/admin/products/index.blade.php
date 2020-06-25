@extends('layouts.cabinet')

@section('content')
    <div class="btn-group mt-2 mb-2">
        <form method="POST" action="{{route('admin.products.add')}}">
            @csrf
            <button class="btn btn-danger">Обновить таблицу</button>
        </form>

    </div>
    <div class="card mb-3">
        <div class="card-header"><h2 class="text-center mb-2 border-bottom">Фильтр по товарам</h2></div>
        <div class="card-body">

            <form action="{{route('admin.products.index')}}" method="get">
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
                            <label for="name" class="col-form-label">Код детали</label>
                            <input id="name" class="form-control" name="code" value="{{ request('code') }}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="active" class="col-form-label">Активность</label>
                            <input id="active" class="form-control" name="active" value="{{ request('active') }}">
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
                    <th>ID</th>
                    <th>Код</th>
                    <th>Редактировать</th>
                </tr>
                </thead>
                <tbody>
@if($products)
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            {{ $product->code }}
                        </td>

                        <td>
                            <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-warning">Показать товары</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {{ $products->appends($_GET)->links() }}
@endif
@endsection