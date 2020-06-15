@component('mail::message')
    # Сообщение с сайта.


@component('mail::table')
| Имя                     |  Телефон            |  Почта           |
| ------------------------|-------------------| :-----------------:|
| {{$name}}               | {{$phone}}          | {{$email}}       |
@endcomponent
@component('mail::panel')
        #Сообщение
        {{$message}}
@endcomponent

    Администрация сайта {{ config('app.name') }}
@endcomponent
