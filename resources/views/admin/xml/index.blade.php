@extends('layouts.cabinet')

@section('content')

    <div class="card mb-3">
        <div class="card-header"><h2 class="text-center mb-2 border-bottom">Настройка выборки</h2></div>
        <div class="card-body">

            <form action="{{route('admin.xml.set')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="seller" class="col-form-label">Продавец</label>
                            <select id="seller" class="form-control" name="seller">
                                @foreach ($sellers as $seller)
                                    <option value="{{ $seller->seller}} " {{ $seller->seller === request('seller') ? ' selected' : ''}}>
                                        {{ $seller->seller}}</option>
                                @endforeach;
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="note" class="col-form-label">Склад</label>
                            <select id="note" class="form-control" name="note">
                                {{--{{dd($notes)}}--}}
                                @foreach ($notes as $note)
                                    <option value="{{ $note->note}} " {{ $note->note === request('seller') ? ' selected' : ''}}>
                                        {{ $note->note}}</option>
                                @endforeach;
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-bitbucket  mt-3">Загрузить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection