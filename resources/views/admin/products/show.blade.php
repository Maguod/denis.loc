@extends('layouts.cabinet')

@section('content')
{{--@include('admin.users._nav')--}}


<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Производитель</th>
        <th>Группа товара</th>
        <th>Код</th>
        <th>Цена</th>
        <th>Примечение</th>
        <th>Активность</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($uploaders as $up)
    <tr>
        <td>{{ $up->id }}</td>
        {{--<td><a href="{{ route('admin.users.show', $user) }}" class="btn btn-success">{{ $user->name }}</a></td>--}}
        <td>{{ $up->seller }}</td>
        <td>{{ $up->type }}</td>
        <td>
            {{ $up->code }}
        </td>
        <td>
            {{ $up->price }}
        </td>
        <td>
            {{ $up->note }}
        </td>
        <td>
            @if ($up->isWait())
            <span class="btn btn-info">Неактивный</span>
            @endif
            @if ($up->isActive())
            <span class="btn btn-primary">Активный</span>
            @endif
        </td>
    </tr>
    @endforeach

    </tbody>
</table>

{{--{{ $uploaders->links() }}--}}

@endsection