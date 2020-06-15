@extends('layouts.cabinet')

@section('content')
{{--@include('admin.users._nav')--}}
<div class="card mb-3">
    <div class="card-header"><h2 class="text-center mb-2 border-bottom">Фильтр по товарам</h2></div>

</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Производитель</th>
        <th>Группа товара</th>
        <th>Код</th>
        <th>Цена</th>
        <th>Примечение</th>
        <th>Активный</th>
        <th>Редактировать</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        {{--<td><a href="{{ route('admin.users.show', $user) }}" class="btn btn-success">{{ $user->name }}</a></td>--}}
        <td>{{ $product->seller }}</td>
        <td>{{ $product->type }}</td>
        <td>
            {{ $product->code }}
        </td>
        <td>
            {{ $product->price }}
        </td>
        <td>
            {{ $product->note }}
        </td>
        <td>
            @if ($product->isWait())
            <span class="btn btn-info">Неактивный</span>
            @endif
            @if ($product->isActive())
            <span class="btn btn-primary">Активный</span>
            @endif
        </td>
        <td>
            <a href="{{route('admin.products.edit', $product)}}" class="btn btn-warning">Редактировать товар</a>
        </td>
        {{--<td>--}}
        {{--<form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="mr-1">--}}
        {{--@csrf--}}
        {{--@method('DELETE')--}}
        {{--<button class="btn btn-danger">Delete</button>--}}
        {{--</form>--}}
        {{--</td>--}}
    </tr>
    @endforeach

    </tbody>
</table>

{{ $products->appends(Request::all())->links() }}

@endsection