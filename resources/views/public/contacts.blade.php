@extends('layouts.public')

@section('content')

    <div class="auto_sec">
        <div class="container">

            <span class="mb-3"></span>
            <h1 class="text-center mb-4" role="main"><a href="/">Варвик </a> наши контакты</h1>
            <span ></span>

        </div>
    </div>
<div class="contact">
    <div class="container">

        <div class="contact-bottom  mb-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3880.2833431084864!2d30.725014669706788!3d46.55214417349601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0J7QtNC10YHRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCDQsy4g0J7QtNC10YHRgdCwICDRg9C7LiDQltC10LLQsNGF0L7QstCwINCT0L7RgNCwIDHQsCwgINCQ0LLRgtC-0YDQuNC90L7QuiAi0JrRg9GP0LvRjNC90LjQuiIgKNCv0LzQsCkg0LzQsNCz0LDQt9C40L0g4oSWNjQy!5e0!3m2!1sru!2sua!4v1561810119957!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
            <div class="contact-text">
                <div class="col-md-3 contact-right">
                    <div class="address" role="note">
                        <h5>Основной склад</h5>
                        <p>Одесская область г. Одесса

                            <span> ул. Жевахова Гора 1а,</span>  Авторинок "Куяльник" (Яма) магазин №642.</p>
                    </div>
                    <div class="address" role="note">
                        <h5>Наши контакты</h5>
                        <p>т. 067-481-77-94 и 063-784-37-93
                            <span>SKYPE: denisbaharevich</span>
                            <span>ICQ/QIP: 605298863</span>
                            Email: <a href="mailto:Rpmpartservice@gmail.com">Написать нам</a></p>
                    </div>
                </div>
                @include('layouts.partials.flash')
                <div class="col-md-9 contact-left">
                    <form action="{{route('public.send')}}" method="post">
                        @csrf
                        <input type="text" name="name" placeholder="Имя" value="{{ request('name')}}" required />
                        <input type="email" name="email" placeholder="Почта" value="{{ request('email')}}" required  />
                        <input type="tel" name="phone" placeholder="телефон (цифры)" pattern="^[0-9]{10,12}" value="{{ request('phone')}}" />
                        <textarea value="{{ request('message')}}" name="message" placeholder="Сообщение..." rows="12"></textarea>
                        <div class="submit-btn">
                            <input type="submit" value="SUBMIT">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

<!---->
@endsection