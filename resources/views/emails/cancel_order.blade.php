@component('mail::message')
# Замовлення скасовано

Ваше замовлення на товар: {{$name_prod}}, було скасовано адміністратором.

Щоб вирішити причину можете зв`язатися з адміністрацією на нашому сайті.

@component('mail::button', ['url' => route('main')])
Перейти на сайт
@endcomponent

@endcomponent
