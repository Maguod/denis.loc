@extends('layouts.category')

@section('content')
        <div class="content mt-3">
            <div class="container">
                <div class="row mt-1 mb-3">
                    <div class="col-xs-12 mb-3">
                        <h1 role="main">Категории \ группы автотоваров</h1>
                    </div>
                </div>
                <div class="row">
                    @foreach ($cats as $cat)
                        <div class="card col-xs-12 col-md-6 col-md-4 mb-3">
                            {{--<h4 class="mb-1 ">{{$cat->name}}</h4>--}}
                            <h4><a href="{{route('public.category.show', $cat->slug)}}" class="btn btn-success">{{$cat->name}}</a></h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    {{ $cats->links() }}
                </div>
            </div>
        </div>
        @include('layouts.main.mainlist')
@endsection