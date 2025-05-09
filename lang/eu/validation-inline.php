<?php

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

return [
    'accepted' => 'Eremu hori onartu behar.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'Hau ez da baliozko URL.',
    'after' => 'Hau behar data bat egin ondoren, :date.',
    'after_or_equal' => 'Hau behar data bat egin ondoren, edo berdina :date.',
    'alpha' => 'Eremu hau soilik egin ahal izango ditu letrak.',
    'alpha_dash' =>
        'Eremu hau soilik egin ahal izango ditu letrak, zenbakiak, marrak eta azpimarrak.',
    'alpha_num' =>
        'Eremu hau soilik egin ahal izango ditu letrak eta zenbakiak.',
    'array' => 'Eremu hau behar array bat.',
    'before' => 'Hau behar data bat aurretik :date.',
    'before_or_equal' => 'Hau behar data bat aurretik edo berdina :date.',
    'between' => [
        'array' => 'This content must have between :min and :max items.',
        'file' => 'This file must be between :min and :max kilobytes.',
        'numeric' => 'This value must be between :min and :max.',
        'string' => 'This string must be between :min and :max characters.',
    ],
    'boolean' => 'Eremu hau izan behar egia edo gezurra.',
    'confirmed' => 'Baieztapen horrek ez du partida.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Hau ez da baliozko data bat.',
    'date_equals' => 'Hau behar data bat berdina :date.',
    'date_format' => 'Hau ez dator formatu :format.',
    'declined' => 'This value must be declined.',
    'declined_if' => 'This value must be declined when :other is :value.',
    'different' => 'Balio hau izan behar desberdinak :other.',
    'digits' => 'Hau izan behar :digits digituak.',
    'digits_between' => 'Hau bitartekoa izan behar du :min eta :max digituak.',
    'dimensions' => 'Irudi hau du baliogabea neurriak.',
    'distinct' => 'Eremu hau bat du bikoiztu balio.',
    'email' => 'Hau izan behar da baliozko helbide elektroniko bat.',
    'ends_with' => 'Hau behar amaiera hauetako bat: :values.',
    'enum' => 'The selected value is invalid.',
    'exists' => 'Hautatutako balio baliogabea da.',
    'file' => 'Eduki bat izan behar du fitxategia.',
    'filled' => 'Eremu hau bat izan behar du balio.',
    'gt' => [
        'array' => 'The content must have more than :value items.',
        'file' => 'The file size must be greater than :value kilobytes.',
        'numeric' => 'The value must be greater than :value.',
        'string' => 'The string must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The content must have :value items or more.',
        'file' =>
            'The file size must be greater than or equal :value kilobytes.',
        'numeric' => 'The value must be greater than or equal :value.',
        'string' =>
            'The string must be greater than or equal :value characters.',
    ],
    'image' => 'Hau izan behar da irudi bat.',
    'in' => 'Hautatutako balio baliogabea da.',
    'in_array' => 'Balio hau ez da existitzen :other.',
    'integer' => 'Hau izan behar da zenbaki oso bat.',
    'ip' => 'Hau izan behar da, IP helbide balioduna.',
    'ipv4' => 'Hau izan behar da baliozko IPv4 helbidea.',
    'ipv6' => 'Hau izan behar da baliozko IPv6 helbidea.',
    'json' => 'Hau izan behar da baliozko JSON katea.',
    'lt' => [
        'array' => 'The content must have less than :value items.',
        'file' => 'The file size must be less than :value kilobytes.',
        'numeric' => 'The value must be less than :value.',
        'string' => 'The string must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The content must not have more than :value items.',
        'file' => 'The file size must be less than or equal :value kilobytes.',
        'numeric' => 'The value must be less than or equal :value.',
        'string' => 'The string must be less than or equal :value characters.',
    ],
    'mac_address' => 'The value must be a valid MAC address.',
    'max' => [
        'array' => 'The content must not have more than :max items.',
        'file' => 'The file size must not be greater than :max kilobytes.',
        'numeric' => 'The value must not be greater than :max.',
        'string' => 'The string must not be greater than :max characters.',
    ],
    'mimes' => 'Hau izan behar da fitxategi mota: :values.',
    'mimetypes' => 'Hau izan behar da fitxategi mota: :values.',
    'min' => [
        'array' => 'The value must have at least :min items.',
        'file' => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string' => 'The string must be at least :min characters.',
    ],
    'multiple_of' => 'Balio bat izan behar du anitz :value',
    'not_in' => 'Hautatutako balio baliogabea da.',
    'not_regex' => 'Formatu hau ez da balioduna.',
    'numeric' => 'Hau zenbaki bat izan behar da.',
    'password' => 'Pasahitza ez da zuzena.',
    'present' => 'Eremu honetan egon behar.',
    'prohibited' => 'Eremu honetan debekatuta dago.',
    'prohibited_if' =>
        'Eremu honetan debekatuta dago denean :other da, :value.',
    'prohibited_unless' =>
        'Eremu honetan debekatuta dago ezean :other da :values.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'Formatu hau ez da balioduna.',
    'required' => 'Eremu hau beharrezkoa da.',
    'required_array_keys' => 'This field must contain entries for: :values.',
    'required_if' => 'Eremu hau beharrezkoa da denean :other da :value.',
    'required_unless' =>
        'Eremu hau beharrezkoa da behintzat :other da :values.',
    'required_with' => 'Eremu hau beharrezkoa da denean :values da gaur.',
    'required_with_all' =>
        'Eremu hau beharrezkoa da denean :values agertu dira.',
    'required_without' =>
        'Eremu hau beharrezkoa da denean :values ez da gaur egun.',
    'required_without_all' =>
        'Eremu hau beharrezkoa da, noiz ere ez :values agertu dira.',
    'same' => 'Eremu honen balioa etorri behar du bat :other.',
    'size' => [
        'array' => 'The content must contain :size items.',
        'file' => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string' => 'The string must be :size characters.',
    ],
    'starts_with' => 'Hau batekin hasi behar hauetako bat: :values.',
    'string' => 'Hau izan behar da katea.',
    'timezone' => 'Hau izan behar da baliozko zona.',
    'unique' => 'Hau dagoeneko hartu.',
    'uploaded' => 'Hau huts egin du igo.',
    'url' => 'Formatu hau ez da balioduna.',
    'uuid' => 'Hau izan behar da baliozko UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];