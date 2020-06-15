@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}
    {{--<form method="POST" action="{{ route('admin.uploader.createPrice')}}" class="mr-1">--}}
    {{--@csrf--}}

    {{--<button class="btn btn-danger">Скопировать продукты</button>--}}
    {{--</form>--}}
            <div class="box box-primary mb-3">
                <div class="box-header with-border">
                    <h3 class="box-title">Загрузить фаил</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="{{ route('admin.excel.store') }}" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="InputFile">File input</label>
                            <input type="file" name="file" id="InputFile">

                            <p class="help-block">Загрузите фаил. Формат xlsx</p>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Загрузить</button>
                    </div>
                </form>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя файла</th>
                    <th>Дата загрузки прайса</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($excel as $exc)
                    <tr>
                        <td>{{ $exc->id }}</td>
                        <td>{{ $exc->name }}</td>
                        <td>{{ $exc->created_at}}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.uploader.storePrice', $exc->id)}}" class="mr-1">
                                @csrf
                                <input type="hidden" value="{{$exc->id}}" name="exc">
                                <button class="btn btn-danger">Применить</button>
                            </form>
                            {{--<form method="POST" action="{{ route('admin.uploader.createPrice')}}" class="mr-1">--}}
                                {{--@csrf--}}
                                {{--<input type="hidden" value="{{$exc->id}}" name="exc">--}}
                                {{--<button class="btn btn-danger">Применить</button>--}}
                            {{--</form>--}}
                            {{--<a href="{{ route('admin.uploader.store', $exc) }}" class="btn btn-success">Применить</a>--}}
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.excel.destroy', $exc) }}" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Удалить</button>
                            </form>
                            {{--<a href="{{ route('admin.excel.destroy', $exc) }}" class="btn btn-danger">Удалить</a>--}}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>


@endsection