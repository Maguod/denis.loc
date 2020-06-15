@extends('layouts.cabinet')

@section('content')
    {{--@include('admin.users._nav')--}}

            <form method="POST" action="{{ route('admin.products.update', $product) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="type" class="col-form-label">Группа товара</label>
                    <input id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type', $product->type) }}" required>

                </div>
                <div class="form-group">
                    <label for="code" class="col-form-label">code</label>
                    <input id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code', $product->code) }}" required>

                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">price</label>
                    <input id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price', $product->price) }}" required>

                </div>
                <div class="form-group">
                    <label for="note" class="col-form-label">note</label>
                    <input id="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note" value="{{ old('note', $product->note) }}" required>

                </div>
                <div class="form-group">
                    <select id="active" class="form-control{{ $errors->has('active') ? ' is-invalid' : '' }}" name="active">

                        <option value="yes"
                        @if($product->isWait()) selected @endif
                        >Неактивный</option>
                        <option value="no"
                        @if($product->isActive()) selected @endif
                        >Активный</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

@endsection