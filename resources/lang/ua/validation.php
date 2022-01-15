<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Поле :attribute повинно бути прийнятим.',
    'active_url' => 'Поле :attribute не є допустимою URL-адресою.',
    'after' => 'Поле :attribute повинно бути датою після :date.',
    'after_or_equal' => 'Поле :attribute повинно бути датою після або дорівнювати :date.',
    'alpha' => 'Поле :attribute повинно містити лише літери.',
    'alpha_dash' => 'Поле :attribute повинно містити лише літери, цифри, тире та підкреслення.',
    'alpha_num' => 'Поле :attribute повинно містити лише літери та цифри.',
    'array' => 'Поле :attribute повинно бути масивом.',
    'before' => 'Поле :attribute повинно бути датою до :date.',
    'before_or_equal' => 'Поле :attribute повинно бути датою до або дорівнювати :date.',
    'between' => [
        'numeric' => 'Поле :attribute повинно бути між :min і :max.',
        'file' => 'Поле :attribute повинно бути між :min і :max кілобайт.',
        'string' => 'Поле :attribute повинно бути між :min і :max символів.',
        'array' => 'Поле :attribute повинно бути між :min і :max елементів.',
    ],
    'boolean' => 'Поле :attribute має бути істиною або брехнею.',
    'confirmed' => 'Поле :attribute не відповідає.',
    'date' => 'Поле :attribute не є дійсною датою.',
    'date_equals' => 'В полі :attribute має бути дата, рівною :date.',
    'date_format' => 'Поле :attribute не відповідає формату :format.',
    'different' => 'Поле :attribute та :other повинні відрізнятися.',
    'digits' => 'Поле :attribute повинно мати такі :digits цифри.',
    'digits_between' => 'Поле :attribute повинно бути між :min і :max цифрами.',
    'dimensions' => 'Поле :attribute має недійсні розміри зображення.',
    'distinct' => 'Поле :attribute має повторюване значення.',
    'email' => 'Поле :attribute повинно бути дійсною адресою електронної пошти.',
    'ends_with' => 'Поле :attribute повинно закінчуватися одним із таких значень: :values.',
    'exists' => 'Вибране поле :attribute недійсне.',
    'file' => 'Поле :attribute має бути файлом.',
    'filled' => 'Поле :attribute має мати значення.',
    'gt' => [
        'numeric' => 'Поле :attribute повинно бути більшим за :value.',
        'file' => 'Поле :attribute повинно бути більшим за :value кілобайт.',
        'string' => 'Поле :attribute повинно бути більшим за :value символів.',
        'array' => 'Поле :attribute повинно бути більшим за :value елементів.',
    ],
    'gte' => [
        'numeric' => 'Поле :attribute повинно бути більшим або рівним :value.',
        'file' => 'Поле :attribute повинно бути більшим або рівним :value кілобайт.',
        'string' => 'Поле :attribute повинно бути більшим або рівним :value символів.',
        'array' => 'Поле :attribute повинно мати :value елементів або більше.',
    ],
    'image' => 'Поле :attribute повинно бути зображенням.',
    'in' => 'Вибране поле :attribute недійсне.',
    'in_array' => 'Поле :attribute не існує в :other.',
    'integer' => 'Поле :attribute має бути цілим числом.',
    'ip' => 'Поле :attribute повинно бути дійсною IP-адресою.',
    'ipv4' => 'Поле :attribute має бути дійсною адресою IPv4.',
    'ipv6' => 'Поле :attribute має бути дійсною адресою IPv6.',
    'json' => 'Поле :attribute має бути дійсним рядком JSON.',
    'lt' => [
        'numeric' => 'Поле :attribute повинно бути меншим за :value.',
        'file' => 'Поле :attribute повинно бути меншим за :value кілобайт.',
        'string' => 'Поле :attribute повинно бути меншим за :value символів.',
        'array' => 'Поле :attribute повинно бути меншим за :value елементів.',
    ],
    'lte' => [
        'numeric' => 'Поле :attribute повинно бути меншим або рівним :value.',
        'file' => 'Поле :attribute повинно бути меншим або рівним :value кілобайт.',
        'string' => 'Поле :attribute повинно бути меншим або рівним :value символів.',
        'array' => 'Поле :attribute повинно бути меншим або рівним :value елементів.',
    ],
    'max' => [
        'numeric' => 'Поле :attribute не повинно бути більшим за :max.',
        'file' => 'Поле :attribute не повинно бути більшим за :max кілобайт.',
        'string' => 'Поле :attribute не повинно бути більшим за :max символів.',
        'array' => 'Поле :attribute не повинно мати більше ніж :max елементів.',
    ],
    'mimes' => 'Поле :attribute повинно бути файлом типу: :values.',
    'mimetypes' => 'Поле :attribute повинно бути файлом типу: :values.',
    'min' => [
        'numeric' => 'Поле :attribute повинно бути принаймні :min.',
        'file' => 'Поле :attribute повинно бути принаймні :min кілобайт.',
        'string' => 'Поле :attribute повинно бути принаймні :min символів.',
        'array' => 'Поле :attribute повинно бути принаймні :min елементів.',
    ],
    'multiple_of' => 'Поле :attribute повинно бути кратним :value.',
    'not_in' => 'Вибране поле :attribute недійсне.',
    'not_regex' => 'Формат поля :attribute недійсний.',
    'numeric' => 'Поле :attribute має бути числом.',
    'password' => 'Цей пароль неправильний.',
    'present' => 'Поле :attribute повинно бути присутнім.',
    'regex' => 'Формат поля :attribute недійсний.',
    'required' => 'Поле :attribute обов’язкове.',
    'required_if' => 'Поле :attribute є обов’язковим, коли :other є :value.',
    'required_unless' => 'Поле :attribute є обов’язковим, якщо :other не знаходиться в :values.',
    'required_with' => 'Поле :attribute є обов’язковим, коли присутній :values.',
    'required_with_all' => 'Поле :attribute є обов’язковим, коли присутні такі заначення: :values.',
    'required_without' => 'Поле :attribute обов’язкове, коли :values немає.',
    'required_without_all' => 'Поле :attribute є обов’язковим, коли немає жодного із значень: :values.',
    'prohibited' => 'Поле :attribute заборонено.',
    'prohibited_if' => 'Поле :attribute заборонено, коли :other є :value.',
    'prohibited_unless' => 'Поле :attribute заборонено, якщо :other не знаходиться в :values.',
    'same' => 'Поле :attribute і :other повинні збігатися.',
    'size' => [
        'numeric' => 'Поле :attribute повинно бути :size.',
        'file' => 'Поле :attribute повинно бути :size кілобайт.',
        'string' => 'Поле :attribute повинно бути :size символів.',
        'array' => 'Поле :attribute повинно містити :size елементів.',
    ],
    'starts_with' => 'Поле :attribute повинно починатися з одного з таких значень: :values.',
    'string' => 'Поле :attribute повинно бути рядком.',
    'timezone' => 'Поле :attribute повинно бути допустимою зоною.',
    'unique' => 'Поле :attribute вже взятий.',
    'uploaded' => 'Поле :attribute не вдалося завантажити.',
    'url' => 'Формат поля :attribute недійсний.',
    'uuid' => 'Поле :attribute повинно бути дійсним UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
