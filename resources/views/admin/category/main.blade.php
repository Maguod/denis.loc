@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}



    @include('layouts.partials.flash')

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
        @foreach ($cats as $key=>$cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{$cat->in_price ? $cat->in_price : ''}}</td>
                <td>
                    <a href="{{route('admin.category.edit', $cat)}}" class="btn btn-warning">Редактировать категорию</a>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>

@endsection