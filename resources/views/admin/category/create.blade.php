@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}

            <form method="POST" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Название рубрики</label>
                        <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="parent_id" class="col-form-label">ИД родительской категории</label>
                        <input id="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id" value="{{ old('parent_id') }}" required >
                        @if ($errors->has('parent_id'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('parent_id') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="main" class="col-form-label">Список рубрик</label>
                        <select id="main" class="form-control" name="main">
                            <option value=""></option>
                            @foreach ($mains as $value => $label)
                                {{--{{dd($label)}}--}}
                                <option value="{{ $label->id}} " {{ $value === request('main') ? ' selected' : ''}}>
                                    {{ $label->name }}</option>
                            @endforeach;
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-form-label">Фото</label>
                        <input id="file" type="file" name="file" class="form-control">
                    </div>
                    <input type="submit" value="Создать категории">
                </div>
            </form>

@endsection