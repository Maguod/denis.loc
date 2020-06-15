<div class="services">
    <div class="container">

        <h3 class="text-center"><a href="{{route('public.main.index')}}" role="note">Автотовары по рубрикам</a></h3>
        <span></span>
        <div class="row mains mt-3">
                @foreach(mainList() as $main)
                    <div class="col-xs-6 col-md-4 col-lg-3 card_boxs">
                        <a href="{{route('public.main.show', $main->slug)}}" >
                            <div class="card_box">
                                <div class="img_box">
                                    @if(null !== $main->image)
                                        <img src="/upload/main/{{$main->image}}" alt="{{$main->name}}" >
                                    @else
                                        <img src="https://via.placeholder.com/184/e0e0e0/FFFFFF/?text=..." alt="">
                                    @endif
                                </div>
                                <div class="text ">
                                    <a href="{{route('public.main.show', $main->slug)}}" class="bold" >{{$main->name}}</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

        </div>
    </div>
</div>