@extends('layouts.cabinet')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--@include('admin.users._nav')--}}

            <form method="POST" action="{{ route('admin.uploader.update', $uploader) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="type" class="col-form-label">Группа товара</label>
                    <input id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type', $uploader->type) }}" required>
                </div>
                <div class="form-group">
                    <label for="code" class="col-form-label">Код</label>
                    <input id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code', $uploader->code) }}" required>
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Прайс цена</label>
                    <input id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price', $uploader->price) }}" required>
                </div>
                <div class="form-group">
                    <label for="margin_price" class="col-form-label">Цена с наценкой</label>
                    <input id="margin_price" class="form-control{{ $errors->has('margin_price') ? ' is-invalid' : '' }}" name="margin_price" value="{{ old('margin_price', $uploader->margin_price) }}" required>
                </div>
                <div class="form-group">
                    <label for="note" class="col-form-label">Примечание</label>
                    <input id="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note" value="{{ !empty($uploader->note) ? $uploader->note : old('note' ) }}" required>
                </div>
                <div class="form-group">

                    <label for="description" class="col-form-label">Описание</label>
                    <input type="text" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ !empty($uploader->description) ? $uploader->description : old('description') }}" >

                </div>
                <div class="form-group">
                    <label for="meta_search" class="col-form-label">Поисковые запросы</label>
                    <input type="text"id="meta_search" class="form-control{{ $errors->has('meta_search') ? ' is-invalid' : '' }}" name="meta_search" value="{{ !empty($uploader->meta_search) ? $uploader->meta_search : old('meta_search') }}" >
                </div>
                <div class="form-group">
                    <label for="image_link" class="col-form-label">Картинка</label>
                    <input id="image_link" class="form-control{{ $errors->has('image_link') ? ' is-invalid' : '' }}" name="image_link" value="{{ !empty($uploader->image_link) ? $uploader->image_link : old('image_link') }}">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

@endsection