@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}
    <div class="card mb-3">
        <div class="btn-group mt-2 mb-2">
            <form method="POST" action="{{route('admin.seller.add')}}">
                @csrf
                <input type="hidden" value="add" name="add">
                <button class="btn btn-danger">Создать\Обновить список</button>
            </form>
        </div>

        <div class="card-header"><h2 class="text-center mb-2 border-bottom">Фильтр продавцов</h2></div>
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
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
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($sellers as $seller)
            <tr>
                <td>{{ $seller->id }}</td>
                <td>{{ $seller->name }}</td>
                <td>
                    <a href="{{route('admin.seller.edit', $seller->id)}}" class="btn btn-warning">Редактировать категорию</a>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $sellers->links() }}

@endsection