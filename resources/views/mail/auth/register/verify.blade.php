@component('mail::message')
# Подтверждение почты

Перейдите по ссылке что бы подтвердить:

@component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
    Verify Email
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent