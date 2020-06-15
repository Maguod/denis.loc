@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}

            <div class="btn-group mt-2 mb-2">
                <form method="POST" action="{{route('admin.category.add')}}">
                    @csrf
                    <input type="hidden" value="true" name="store">
                    <button class="btn btn-danger">Создать \ Обновить </button>
                </form>
            </div>
            <div class="btn-group mt-2 mb-2">
                <form method="POST" action="{{route('admin.category.findNoMain')}}">
                    @csrf
                    <button class="btn btn-danger">Категории без привязки к сайту \ новые</button>
                </form>
            </div>
            {{--<div class="btn-group mt-2 mb-2">--}}
                {{--<a href="{{route('admin.category.create')}}" class="btn btn-danger">Создать вручную категорию</a>--}}
            {{--</div>--}}
            {{--<div class="btn-group mt-2 mb-2">--}}
                {{--<a href="{{route('admin.category.createMainToCategories')}}" class="btn btn-danger">Создать Связи</a>--}}
                {{--<a href="{{route('admin.category.createOldCategories')}}" class="btn btn-danger">Создать Копию</a>--}}
                {{--<form method="GET" action="{{route('admin.category.create')}}">--}}
                    {{--@csrf--}}
                    {{--<input type="hidden" value="true" name="main">--}}
                    {{--<button class="btn btn-danger">Создать Категорию</button>--}}
                {{--</form>--}}
            {{--</div>--}}


        <div class="card-header"><h2 class="text-center mb-2 border-bottom">Фильтр по рубрикам</h2></div>
        <div class="card-body">
            <form action="{{route('admin.category.search')}}" method="get">
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
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="in_price" class="col-form-label">Оригинал в прайсе</label>
                            <input id="in_price" class="form-control" name="in_price" value="{{ request('in_price') }}">
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
                        {{--{{dd($cat->price)}}--}}
                    </tr>
                @endforeach

                </tbody>
            </table>

            {{ $cats->appends(Request::all())->links() }}

@endsection