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

    'accepted' => '     :attribute     يجب أن تكون مقبولة.',
    'active_url' => '     :attribute     ليس عنوان URL صالحًا.',
    'after' => '     :attribute     يجب أن يكون تاريخ بعد   :date.',
    'after_or_equal' => '     :attribute     يجب أن يكون تاريخ بعد أو يساوي   :date.',
    'alpha' => '     :attribute     قد تحتوي فقط على رسائل.',
    'alpha_dash' => '     :attribute     قد يحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => '     :attribute     قد تحتوي فقط على حروف وأرقام.',
    'array' => '     :attribute     يجب أن يكون مجموعة.',
    'before' => '     :attribute     يجب أن يكون تاريخ من قبل   :date.',
    'before_or_equal' => '     :attribute     يجب أن يكون تاريخ قبل أو يساوي   :date.',
    'between' => [
        'numeric' => '     :attribute     يجب ان يكون وسطا   :min و  :max.',
        'file' => '     :attribute     يجب ان يكون وسطا   :min و  :max كيلو بايت.',
        'string' => '     :attribute     يجب ان يكون وسطا   :min و  :max الشخصيات.',
        'array' => '     :attribute     يجب أن يكون بين   :min و  :max العناصر.',
    ],
    'boolean' => '     :attribute     يجب أن يكون الحقل صواب أو خطأ.',
    'confirmed' => '     :attribute     التأكيد غير متطابق.',
    'date' => '     :attribute     هذا ليس تاريخ صحيح.',
    'date_equals' => '     :attribute     يجب أن يكون تاريخ يساوي :date.',
    'date_format' => '     :attribute     لا يطابق   :format.',
    'different' => '     :attribute     و  :other يجب أن تكون مختلفة.',
    'digits' => '     :attribute     يجب أن تكون   :digits الأرقام.',
    'digits_between' => '     :attribute     يجب ان يكون وسطا   :min و  :max الأرقام.',
    'dimensions' => '     :attribute     له أبعاد صورة غير صالحة.',
    'distinct' => '     :attribute     الحقل له قيمة مكررة
.',
    'email' => '     :attribute     يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with' => '     :attribute     يجب أن ينتهي بواحد مما يلي: :values',
    'exists' => '     selected:    السمة غير صالحة.',
    'file' => '     :attribute     يجب أن يكون ملف.',
    'filled' => '     :attribute     يجب أن يكون الحقل قيمة
.',
    'gt' => [
        'numeric' => '     :attribute     يجب أن يكون أكبر من   :value.',
        'file' => '     :attribute     يجب أن يكون أكبر من   :value كيلو بايت.',
        'string' => '     :attribute     يجب أن يكون أكبر من   :value الشخصيات.',
        'array' => '     :attribute     يجب أن يكون أكثر من   :value العناصر.',
    ],
    'gte' => [
        'numeric' => '     :attribute     يجب أن يكون أكبر من أو يساوي   :value.',
        'file' => '     :attribute     يجب أن يكون أكبر من أو يساوي   :value كيلو بايت.',
        'string' => '     :attribute     يجب أن يكون أكبر من أو يساوي   :value الشخصيات.',
        'array' => '     :attribute     يجب ان يملك   :value العناصر or أكثر.',
    ],
    'image' => '     :attribute     يجب أن تكون صورة.',
    'in' => '     selected :    السمة غير صالحة.',
    'in_array' => '     :attribute     الحقل غير موجود في   :other.',
    'integer' => '     :attribute     يجب أن يكون صحيحا.',
    'ip' => '     :attribute     يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => '     :attribute     يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => '     :attribute     يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => '     :attribute     يجب أن تكون سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => '     :attribute     يجب أن يكون أقل من   :value.',
        'file' => '     :attribute     يجب أن يكون أقل من   :value كيلو بايت.',
        'string' => '     :attribute     يجب أن يكون أقل من   :value الشخصيات.',
        'array' => '     :attribute     يجب أن يكون أقل من   :value العناصر.',
    ],
    'lte' => [
        'numeric' => '     :attribute     يجب أن يكون أقل من أو يساوي   :value.',
        'file' => '     :attribute     يجب أن يكون أقل من أو يساوي   :value كيلو بايت.',
        'string' => '     :attribute     يجب أن يكون أقل من أو يساوي   :value الشخصيات.',
        'array' => '     :attribute     يجب ألا يكون أكثر من   :value العناصر.',
    ],
    'max' => [
        'numeric' => '     :attribute       اصغر او يساوي   :max.',
        'file' => '     :attribute     قد لا يكون أكبر من   :max كيلو بايت.',
        'string' => '     :attribute     قد لا يكون أكبر من   :max الشخصيات.',
        'array' => '     :attribute     قد لا يكون أكثر من   :max العناصر.',
    ],
    'mimes' => '     :attribute     يجب أن يكون ملف من النوع : :values.',
    'mimetypes' => '     :attribute     يجب أن يكون ملف من النوع : :values.',
    'min' => [
        'numeric' => '     :attribute     لا بد أن يكون على الأقل   :min.',
        'file' => '     :attribute     لا بد أن يكون على الأقل   :min كيلو بايت.',
        'string' => '     :attribute     لا بد أن يكون على الأقل   :min الشخصيات.',
        'array' => '     :attribute     يجب أن يكون على الأقل   :min العناصر.',
    ],
    'not_in' => '     selected :    السمة غير صالحة.',
    'not_regex' => '     :attribute     غير صالح.',
    'numeric' => '     :attribute     يجب أن يكون رقما.',
    'present' => '     :attribute     يجب أن يكون الحقل حاضرا.',
    'regex' => '     :attribute     غير صالح.',
    'require' => '  مطلوب',
    'required' => '     :attribute مطلوب',
    'required_if' => '     :attribute     حقل مطلوب عندما  :other يكون   :value.',
    'required_unless' => '     :attribute     الحقل مطلوب ما لم   :other في داخل   :values.',
    'required_with' => '     :attribute     حقل مطلوب عندما   :values حاضر.',
    'required_with_all' => '     :attribute     حقل مطلوب عندما   :values حاضرون.',
    'required_without' => '     :attribute     حقل مطلوب عندما   :values غير موجود.',
    'required_without_all' => '     :attribute     حقل مطلوب عندما لا شيء من :values حاضرون.',
    'same' => '     :attribute     و  :other يجب أن تطابق.',
    'size' => [
        'numeric' => '     :attribute     لا بد وأن   :size.',
        'file' => '     :attribute     لا بد وأن   :size كيلو بايت.',
        'string' => '     :attribute     لا بد وأن   :size الشخصيات.',
        'array' => '     :attribute     يجب أن يحتوي على   :size العناصر.',
    ],
    'starts_with' => '     :attribute     يجب أن يبدأ بأحد الإجراءات التالية: :values',
    'string' => '     :attribute     يجب أن يكون سلسلة.',
    'timezone' => '     :attribute     يجب أن تكون منطقة صالحة
.',
    'unique' => '     :attribute    لقد اتخذت بالفعل.',
    'uploaded' => '     :attribute     فشل في التحميل.',
    'url' => '     :attribute     غير صالح.',
    'uuid' => '     :attribute     يجب أن يكون UUID صالح.',

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

    'attributes' => [
        'name' => 'اسم',
        'email' => 'البريد الإلكتروني',
    ],

];
