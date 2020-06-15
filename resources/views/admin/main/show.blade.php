@extends('layouts.cabinet')

@section('content')
    <div class="btn-group mt-2 mb-2">
        <a href="{{route('admin.main.create')}}" class="btn btn-warning">Создать Рубрику</a>
    </div>

    <h3 class="mb-4 text-center"><span class="text-bold ">{{$main->name}}</span></h3>
    <span></span>
    <table class="table table-bordered table-striped mb-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя \ Редактировать</th>
            <!-- <th>Удалить, осторожно!!!</th> -->
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $main->id }}</td>
            <td>
                <a href="{{route('admin.main.edit', $main)}}" class="btn btn-success ">{{ $main->name }}</a>
            </td>
             <td>
                {{--<form method="post" action="--}}
{{--{{route('admin.main.destroy' , $main)}}--}}
                        {{--">--}}
                    {{--@csrf--}}
                    {{--@method('DELETE')--}}
                    {{--<button class="btn btn-default">Удалить рубрику</button>--}}
                {{--</form>--}}
            </td>
        </tr>
        </tbody>
    </table>
    <hr>

    @if((null !== $main->parent))

        <div style="display:none">{{$main->parent->name}}</div>

            <h4 class="mb-4 ">ссылка на родительскую - <a href="{{route('admin.main.show', $main->parent->id)}}" class="text-bold">{{ $main->parent->name}}</a></h4>
            
        <hr>
    @else
        <h3 class="text-warning mt-3 mb-4">Это главная рубрика</h3>
        <hr>
    @endif
    @if('' !== $childs )
        <h3 class="mb-4"><span class="text-dark">Вложенные рубрики</span></h3>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название \ Редактировать</th>
                <th>Активность</th>
                {{--<th>Удалить</th>--}}
            </tr>
            </thead>
            <tbody>

            @foreach ($childs as $child)
                <tr>
                    <td>{{ $child->id }}</td>
                    <td>
                        <a href="{{route('admin.main.show', $child->id)}}" class="text-secondary">{{ $child->name }}</a>
                    </td>
                    <td>
                    <form method="POST" action="{{ route('admin.main.activate', $child->id) }}" class="mr-1">
                        @csrf
                        @if ($child->isWait())
                            <button class="btn btn-info">Неактивный</button>
                        @endif
                        @if ($child->isActive())
                            <button class="btn btn-primary">Активный</button>
                        @endif
                        {{--<button class="btn btn-primary">Активный</button>--}}
                    </form>
                </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif








@endsection