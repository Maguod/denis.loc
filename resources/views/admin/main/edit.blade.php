@extends('layouts.cabinet')

@section('content')


    <form method="POST" action="{{ route('admin.main.update', $main) }}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="col-form-label">Имя</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $main->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

         <div class="form-group">
            <label for="parent_id" class="col-form-label">Родительская</label>
            <select id="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id">
                @foreach ($all as $value => $label)
                    @if($main->id !== $label->id )
                    <option value=""></option>
                    <option value="{{ $label->id }}" {{(int) $main->parent_id === (int) $label->id ? 'selected' : '' }} > {{ $label->name }}</option>
                    @endif
                @endforeach;
            </select>
            @if ($errors->has('main'))
                <span class="invalid-feedback"><strong>{{ $errors->first('main') }}</strong></span>
            @endif
        </div>
        @if($main->image)
            <div class="form-group">
                <img src="/upload/main/{{$main->image}}" alt="">
            </div>
        @endif
        <div class="form-group">
            <label for="file" class="col-form-label">Фото</label>
            <input id="file" type="file" name="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('file', $main->image) }}" >
            @if ($errors->has('file'))
                <span class="invalid-feedback"><strong>{{ $errors->first('file') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
{{--{{dd($main->categories)}}--}}
    @if($main->categories->isEmpty())
        <div class="col-xs-12">В этой рубрике нет групп товаров из прайса. Возможно и не нужно ;-)</div>
    @else
        <div class="col-xs-12">
            <h3 class="text-center">Группы товаров которые в этой рубрике</h3>
            <ul>
                @foreach($main->categories as $cat)
                    <li><a href="{{route('admin.category.edit', $cat)}}">{{$cat->name}}</a> <- Можешь сразу перейти</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection