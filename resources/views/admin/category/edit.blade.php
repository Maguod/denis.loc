@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}

    <form method="POST" action="{{route('admin.category.update', $cat)}}" >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $cat->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label for="main_id" class="col-form-label">Список рубрик</label>
            <select id="main_id" class="form-control" name="main_id">
                
                <option value=""></option>
                @foreach ($mains as $value => $label)
                    <option value="{{$label->id}}" >
                        {{ $label->name }}</option>
                @endforeach;
            </select>
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    @if(0 !== count($selected))
        <div class="col-xs-12">
            <h3 class="text-center">Рубрики сайта к которым привязана эта группа товаров</h3>
            <ul>
                @foreach($selected as $main)
                    <li><a href="{{route('admin.main.edit', $main)}}">{{$main->name}} </a> &#8592; Перейти в рубрику</li>
                @endforeach
            </ul>
        </div>
     @else
       <div class="col-xs-12">Не относится ни к какой рубрике сайта. Исправь!!!</div>
    @endif


@endsection



