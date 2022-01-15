@component('mail::message')
# Нове замовлення із магазину {{ config('app.name') }}

Особа із такими даними:

ПІБ: {{ $req->pib }}

Місто: {{ $req->city }}

Адреса: {{ $req->adress }}

Телефон: {{ $req->tel }}

Поштовий індекс: {{ $req->zip_code }}

Електронна адреса: {{ $req->email }}


Оформив(ла) замовлення на такий товар:

<p align="center"><img width="250" src="{{asset('storage/'.$prod->img)}}" /></p>

Назва товару: {{$prod->name}}

Ціна товару: {{$prod->price}}

@component('mail::button', ['url' => route('admin.admin-panel')])
Перейти на сайт із замовленням
@endcomponent


@endcomponent
