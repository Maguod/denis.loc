@component('mail::message')
# Заявка с сайта.


@component('mail::table')
    | Имя       | Телефон        | Почта
    | -----------|:-------------:| --------  |
    | {{$name}}  | {{$phone}}    | {{$email}}|
@endcomponent
@component('mail::panel')
    #Сообщение
    {{$message}}
@endcomponent
@component('mail::table')
    | Товар       | ИД            | Производитель | Код        | Цена    |
    | ------------|:-------------:| -------------:|:----------:| -------:|
    |             |{{$id}}        | {{$seller}}  |{{$code}}   |{{$price}}|
@endcomponent

<br>
Администрация сайта {{ config('app.name') }}
@endcomponent
