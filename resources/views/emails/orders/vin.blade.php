@component('mail::message')
    # Запрос по VIN с сайта.

    'Марка' => {{$brand}}
    'модель' => {{$model}}
    'год выпуска' => {{$month}}
    'двигатель' => {{$motor}}
    'КПП' => {{$kpp}}
    'abs' => {{$abs}},
    'гидроусилитель' => {{$гидроусилитель}},
    'электроусилитель' => {{$электроусилитель}},
    'кондиционер' => {{$кондиционер}},
    'Кузов' => {{$kuzov}}
    'ВИН' => {{$vincode}}
    'НОМЕР Двигателя' => {{$engine}}
    'Сообщение' => {{$mess}}
    'Имя' => {{$name}}
    'Телефон' => {{$phone}}
    'Почта' => {{$email}}
    'Город' => {{$city}}
{{--@foreach($data as $name => $value)--}}
    {{--**{{ $name }}: ** {{ $value }}--}}

{{--@endforeach--}}


    Администрация сайта varvik.com.ua
@endcomponent