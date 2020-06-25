@extends('layouts.cabinet')

@section('content')
    <div class="card mb-3">
        <div class="card-header"><h3 class="text-center mb-2 border-bottom">Наценка на товары</h3></div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        {{--@include('layouts.partials.flash')--}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($margins)
            @foreach($margins as $margin)
                <form accept-charset="UTF-8" action="{{ route('admin.margin.update',  $margin)}}" method="POST" class="mb-1" >
                {{--<form method="POST" class="mb-1" action="/admin/margins/update/{{$margin->id}}">--}}
                    @csrf
                    @method('PATCH')

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="start">Цена от</label>
                            <input type="text" class="form-control" name="start" id="start" placeholder="Цена от" value="{{ $margin->start}}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="end">Цена до</label>
                            <input type="text" class="form-control" id="end" name="end" placeholder="Цена до" value="{{ $margin->end}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="margin" class="text-fuchsia">Наценка в %</label>
                            <input type="text" class="form-control" id="margin" name="margin" placeholder="Наценка" value="{{ $margin->margin}}">
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-warning mt-3">Изменить наценку</button>
                        </div>
                    </div>
                </form>
            @endforeach
        @endif
        {{--@if(!$margins)--}}
        <h4 class="text-center mt-3 mb-1 text-blue">Создать наценку</h4>
            <form method="post" action="{{ route('admin.margins.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="start">Цена от</label>
                        <input type="text" class="form-control" name="start" id="start" placeholder="Цена от" value="{{ old('start', '')}}" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="end">Цена до</label>
                        <input type="text" class="form-control" id="end" name="end" placeholder="Цена до" value="{{ old('end', '')}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="margin">Наценка</label>
                        <input type="number" class="form-control" id="margin" name="margin" placeholder="Наценка" value="{{ old('margin', '')}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label ></label>
                        <button type="submit" class="btn btn-warning mt-3">Создать наценку</button>
                    </div>
                </div>

            </form>
        {{--@endif--}}
    </div>
@endsection