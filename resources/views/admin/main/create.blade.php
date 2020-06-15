@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}

    <form method="POST" action="{{ route('admin.main.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label for="parent_id" class="col-form-label">Родительская Рубрика</label>
            <select id="parent_id" class="form-control" name="parent_id">
                <option></option>
                @foreach ($cats as $cat)
                    <option value="{{$cat->id}}">{{ $cat->name }}</option>
                @endforeach;
            </select>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="role" class="col-form-label">Role</label>--}}
            {{--<select id="role" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="role">--}}
                {{--@foreach ($roles as $value => $label)--}}
                    {{--<option value="{{ $value }}"{{ $value === old('role', $user->role) ? ' selected' : '' }}>{{ $label }}</option>--}}
                {{--@endforeach;--}}
            {{--</select>--}}
            {{--@if ($errors->has('role'))--}}
                {{--<span class="invalid-feedback"><strong>{{ $errors->first('role') }}</strong></span>--}}
            {{--@endif--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="image" class="col-form-label">Фото</label>
            <input id="image" type="file" name="image" class="form-control">
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>

@endsection