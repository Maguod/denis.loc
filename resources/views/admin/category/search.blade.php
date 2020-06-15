@extends('layouts.cabinet')

@section('content')
    <div class="card-header"><h2 class="text-center mb-2 border-bottom">Фильтр по рубрикам</h2></div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>В прайсе рубрика</th>
            <th>Редактировать</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($search as $key=>$cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{$cat->in_price ?: ''}}</td>
                <td>
                    <a href="{{route('admin.category.edit', $cat)}}" class="btn btn-warning">Редактировать категорию</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $search->links() }}

@endsection