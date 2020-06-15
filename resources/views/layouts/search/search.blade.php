<div class="vin_bg">
    <div class="container-fluid">
        <div class="row search-row">
            <div class="search-body col-xs-12 col-lg-6">
                <h4 class="mb-1 mt-1 text-center">Запрос для поиска по VIN коду</h4>
                <p class="text-center">Заполните пожалуйста форму которая появиться <img src="/img/right.png" class="arrow-img" alt="Поиск по VIN">  <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Нажмите
                    </a>
                </p>
            </div>
            <hr class="line-white">
            <div class="search-body col-xs-12 col-lg-6">
                <h4 class="mb-1  mt-1 text-center" role="search">Быстрый поиск детали</h4>
                <form action="{{route('public.product.index')}}" method="GET" class="search-form" id="search-main">
                    <div class="label-search">
                        <input id="code" class="" name="code" value="{{ request('code') }}" placeholder="Введите номер или код детали">
                    </div>
                    <button type="submit" class="btn btn-info" role="search">Найти</button>
                </form>
            </div>

        </div>
    </div>
    @if ($errors->any())
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="popup">
    <div class="container-fluid">
        <div class="collapse search_vin row mt-3" id="collapseExample">
            <div class="col-xs-12">
                <div class="alert alert-info mb-3" role="alert">
                    <p >Если вы не знаете номера запчасти или точную конфигурацию своего автомобиля, вы можете отправить запрос нашим специалистам. Для этого достаточно указать VIN/FRAME номер вашего автомобиля, марку, модель, год выпуска, обьем двигателя, тип кузова и подробно описать необходимые вам запчасти.</p>
                    <p class="text-center text-bold">Для корректного подбора автозапчастей для Вашего автомобиля заполните пожалуйста форму запроса.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <form id="vin" action="{{route('public.vinSearch')}}" method="post" class="vin-form" >
                    @csrf
                    <div>
                        <label for="brand">Марка автомобиля</label>
                        <input type="text" id="brand" name="brand" value="{{ old('brand') }}" >
                        <span >Максимум 100 букв и цифр</span>
                    </div>
                    <div>
                        <label for="model">Модель и модификация</label>
                        <input type="text" id="model" name="model" value="{{ old('model') }}">
                        <span >Максимум 100 букв и цифр</span>
                    </div>
                    <div class="form-group month">
                        <label for="month"> Дата выпуска авто</label>
                        <input type="month" id="month" name="month" value="2019-06">
                    </div>
                    <div>
                        <label for="capacity">Обьем двигателя</label>
                        <input type="text" id="capacity" name="capacity" value="{{ old('capacity')}}" >
                        <span >Максимум 10 букв и цифр</span>
                    </div>
                    <div>
                        <select style="width: 100%;" name="motor">
                            <option value="">Тип двигателя
                            </option><option value="Дизель">Дизель
                            </option><option value="Бензин">Бензин
                            </option><option value="Газ">Газ</option>
                            </option><option value="Газ/Бензин">Газ/Бензин</option>
                            </option><option value="Гибрид">Гибрид</option>
                            <option value="Электро">Электро</option>
                        </select>
                    </div>
                    <div>
                        <select style="width: 100%;" name="kpp">
                            <option value="">Выбрать КПП
                            </option><option value="Ручная">Ручная
                            </option><option value="Авто">Авто
                            </option><option value="Вариатор">Вариатор</option>
                            <option value="Роботизированная">Роботизированная</option>
                        </select>
                    </div>
                    <div>
                        <select style="width: 100%;" name="kuzov">
                            <option value="">Выбрать Кузова
                            </option><option value="Седан">Седан</option>
                            <option value="Хетчбек">Хетчбек</option>
                            <option value="Универсал">Универсал</option>
                            <option value="Джип">Джип</option>
                            <option value="Купе">Купе</option>
                            <option value="Кабриолет">Кабриолет</option>
                            <option value="Минивен">Минивен</option>
                            <option value="Микроавтобус">Микроавтобус</option>
                        </select>
                    </div>
                    <div class="form-group flex mt-1">
                        <div>
                            <input type="checkbox" id="abs" name="abs"><label for="abs">АБС</label>
                        </div>
                        <div>
                            <input type="checkbox" id="гидроусилитель" name="гидроусилитель"><label for="гидроусилитель">Гидроусилитель</label>
                        </div>
                        <div>
                            <input type="checkbox" id="электроусилитель" name="электроусилитель"><label for="электроусилитель">Электроусилитель</label>
                        </div>
                        <div>
                            <input type="checkbox" id="кондиционер" name="кондиционер"><label for="кондиционер">Кондиционер</label>
                        </div>
                    </div>

                    <h5>Убедительно просим Вас заглянуть в техпаспорт и ввести "Номер кузова" и "номер двигателя". Эта информация в большинстве случаев необходима для правильного подбора деталей.</h5>
                    <div>
                        <label for="vincode">Номер Кузова(VIN) (*)</label>
                        <input type="text" id="vincode" name="vincode" value="{{ old('vincode')}}" min="10" max="17" required>
                        <span >От 10 до 17 букв и цифр</span>
                    </div>
                    <div>
                        <label for="engine">Номер двигателя / Маркировка мотора</label>
                        <input type="text" id="engine" name="engine" value="{{ old('engine')}}" min="3" max="18" >
                        <span >От 3 до 18 букв и цифр</span>
                    </div>
                    <h5>
                        Укажите максимально точно какая деталь нужна. Сторона и место ее установки: (Лево/Право; Верх/Низ; Перед/Зад)  Возможно у Вас есть предпочтения (Производитель/Материал и т.п.)
                    </h5>
                    <div class="textarea">
                        <label for="mess">Какая деталь Вам необходима? (*)</label>
                        <textarea name="mess" id="mess" required></textarea>
                        <span >От 5 до 500 букв и цифр</span>
                    </div>
                    <div>
                        <label for="name">Как к вам обращаться (*)</label>
                        <input type="text" id="name" name="name" value="{{ old('name')}}" required>
                        <span >От 5 до 500 букв и цифр</span>
                    </div>
                    <div>
                        <label for="phone">Телефон, только цифры (*)</label>
                        <input type="tel" id="phone" name="phone" pattern="^[0-9]{10,14}" value="{{ old('phone')}}" required>
                        <span >От 10 до 14 только цифры</span>
                    </div>
                    <div>
                        <label for="email">Ваша почта</label>
                        <input type="email" id="email" name="email" value="{{ old('phone')}}" >
                    </div>
                    <div>
                        <label for="city">Ваш город</label>
                        <input type="text" id="city" name="city" value="{{ old('city')}}" >
                        <span >От 5 до 100 букв и цифр</span>
                    </div>
                    {{--<input type="text" name="kpp" value="{{ request('kpp')}}" placeholder="Тип КПП">--}}
                    {{--<input type="text" name="body" value="{{ request('body')}}" placeholder="Тип кузова">--}}

                    <div class="form-group flex">
                        <div>
                            <input type="checkbox" id="info" name="info"><label for="info">Поставьте галочку если вы человек</label>
                            <span >Поставьте галочку</span>
                        </div>

                    </div>
                    <div class="submit-btn">
                        <input type="submit" value="Отправить запрос">
                    </div>
                    {{--<input type="submit" class="hvr-bounce-to-right" value="Отправить запрос">--}}
                    {{--<a href="javascript:{}" onclick="document.getElementById('vin').submit();" class="hvr-bounce-to-right">Отправить запрос</a>--}}
                </form>
            </div>
            <div class="col-xs-12 col-md-6">

                <div class="alert alert-success mb-3" role="alert">
                    <p>
                        VIN (Vehicle Identification Number) - Номер шасси (кузова, рамы), чаще всего имеет 17 символов - латинских букв и цифр. Он присваивается автомобилю при выходе с конвейера и содержит точную  информацию о годе выпуска, стране ии заводе-изготовителя, комплектации технических характеристиках Вашего автомобиля.
                    </p>
                    <p>
                        Если у вас японский праворульный автомобиль, то у вас в техпаспорте и на кузове автомобиля указан короткий вин-код так называемый Frame. В таком случае указывайте его.
                    </p>
                </div>
                <div class="alert alert-success mb-3" role="alert">
                    <h4 class="mb-2 text-center">
                        Где указан или находится VIN/FRAME код автомобиля?
                    </h4>
                    <ul class="list-group">
                        <li>в свидетельстве о регистрации или техническом паспорте Вашего автомобиля;</li>
                        <li>в специальном окошке на лобовом стекле (на левой верхней части приборной панели внизу лобового стекла);</li>
                        <li>на стойке водительской двери (внизу водительского дверного проёма с правой стороны);</li>
                        <li>под обшивкой пола, около водительского сиденья или пассажирского сиденья;</li>
                        <li>под капотом на самом кузове или на специальной маркировочной табличке;</li>
                    </ul>
                    <p class="mb-2" >И возле картинки с тех паспортом:
                        На изображении ниже привиден пример VIN кода, указанного в техпаспорте автомобиля:</p>
                    <img src="/img/tech.png" alt="Техпаспорт" max-width="350px" width="100%" height="auto" class="hover-scale">
                </div>
                <div class="alert alert-warning" role="alert">
                    Внимание!
                    Если VIN код указан не полностью или с ошибкой - по VIN Запросу Цены и Сроком поставки придет ОТКАЗ.
                </div>
            </div>
        </div>

    </div>
</div>
