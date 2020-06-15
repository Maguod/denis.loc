@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}

    <div class="btn-group mt-2 mb-2">
        <a href="{{route('admin.main.create')}}" class="btn btn-warning">Создать Рубрику</a>
    </div>
    {{--<div class="btn-group mt-2 mb-2">--}}
        {{--<a href="{{route('admin.main.createOld')}}" class="btn btn-danger">Создать Копию</a>--}}
    {{--</div>--}}


    <div class="card-header"><h2 class="text-center mb-2 border-bottom">Фильтр по рубрикам</h2></div>
    <div class="card-body">
        <form action="?" method="GET">
            <div class="row">
                <div class="col-sm-1">
                    <div class="form-group">
                        <label for="id" class="col-form-label">ID</label>
                        <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Название</label>
                        <input id="name" class="form-control" name="name" value="{{ request('name') }}">
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


    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Родительская рубрика</th>
            <th>Фото</th>
            <th>Активный</th>

            <th>Редактировать</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($main as $key=>$cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>

                    @if(null != $cat->parent)
                    &mdash;
                    @endif
                    <a href="{{route('admin.main.show', $cat->id)}}" class="text-secondary">{{ $cat->name }}</a>
                </td>
                <td>
                    @if(null != $cat->parent)
                        {{$cat->parent->name }}
                    @endif
                </td> 
                <td>
                    @if($cat->image)
                    <img src="/upload/main/{{$cat->image}}" alt="{{$cat->name}}" style="max-height: 80px; width: auto;">
                     @endif
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.main.activate', $cat->id) }}" class="mr-1">
                        @csrf
                        @if ($cat->isWait())
                            <button class="btn btn-info">Неактивный</button>
                        @endif
                        @if ($cat->isActive())
                            <button class="btn btn-primary">Активный</button>
                        @endif
                        {{--<button class="btn btn-primary">Активный</button>--}}
                    </form>
                </td>
                <td>
                    <a href="{{route('admin.main.edit', $cat)}}" class="btn btn-warning">Редактировать рубрику</a>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $main->links() }}

@endsection