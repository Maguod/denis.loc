@extends('layouts.seller')

@section('content')

        <div class="content mt-3">
            <div class="container">
                <div class="row mt-1 mb-3">
                    <div class="col-xs-12 mb-3">
                        <h1 role="main">У нас вы можете купить детали и запчасти от более чем 210 производителей.</h1>
                    </div>
                </div>

                <div class="row">
                    @foreach ($sellers as $seller)
                        <div class="card col-xs-6 col-md-4 mb-3">
                            {{--<h4 class="mb-1 ">{{$seller->name}}</h4>--}}
                            <h4><a href="{{route('public.seller.show', $seller->slug)}}" class="bold">{{$seller->name}}</a></h4>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        <div class="container links_box">
            <div class="row">
                <div class="col-xs-12 text-center">
                    {{ $sellers->links() }}
                </div>
            </div>
        </div>
        <div class="container mt-3 mb-3">
            <div class="row">

                <div class="col-xs-12 welcome_info">
                    <p title="Производители запчастей">У нас на складе вы можете найти различные детали для ДВС от крупных головок блока цилиндра, маслонасосов, помп, поршней до мелких расходников, сальников, маслосъёмных колпачков и всяких мелких прокладок. И все это представлено очень большим ассортиментом оригинальных запчастей как азиатских производителей TOYOTA, HONDA, NISSAN, MITSUBISHI, MAZDA, SUBARU, SUZUKI, ISUZU, DAIHATSU, HYUNDAI, KIA, SSANG YONG и европейских производителей AUDI, BMW, MERCEDES, VOLKSWAGEN (VW), RENAULT, CITROEN, PEUGEOT, OPEL, VOLVO, FIAT, SEAT, SKODA, ALFA ROMEO и т.д.  так и европейских и мировых производителей лицензионных запчастей вроде AJUSA, ELRING, VICTOR REINZ, AMC, ACL, CORTECO, FERODO, KOLBENSCHMIDT и азиатских производителей таких как AISIN, TAIHO, TEIKIN, NDC, KOYO, TP, NTN, RIK, NPR, IZUMI и т.д. У нас в магазине вы можете найти большой ассортимент сальников от моторных и сальников клапанов до гидравлических сальников рулевых реек, и насосов гидроусилителя под давление, сальников на КПП и сальников ступиц. </p>
                </div>
            </div>
        </div>
        @include('layouts.main.mainlist')
        <div class="container container-info mb-5">
            <div class="row">
                <div class="col-xs-12 welcome_info">
                    <p>Предпочтение, которое покупатель отдает той или другой компании производителя автозапчастей во многом зависит от качества произведенных деталей. Владелец автомобиля постоянно выбирает, приобрести обычную или оригинальную автозапчасть со своими особенностями. У любого варианта есть собственные достоинства и минусы.</p>
                </div>
                <div class="col-xs-12 welcome_info">
                    <p>Данный каталог запчастей обеспечит  быстрый поиск и подбор автозапчастей по коду, номеру, производителю. Эти данные позволят вам сделать правильный и осознанный выбор при приобретении товара.</p>
                    <p>Вы всегда можете заказать бесплатный обратный звонок. И наши сотрудники помогут вам с выбором.</p>
                </div>
            </div>
        </div>

@endsection