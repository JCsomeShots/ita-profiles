<?php

declare(strict_types=1);

return [
    'accepted' => ':Attribute ha de ser acceptat.',
    'accepted_if' => 'El :attribute s\'ha d\'acceptar quan :other és :value.',
    'active_url' => ':Attribute no és un URL vàlid.',
    'after' => ':Attribute ha de ser una data posterior a :date.',
    'after_or_equal' => ':Attribute ha de ser una data posterior o igual a :date.',
    'alpha' => ':Attribute només pot contenir lletres.',
    'alpha_dash' => ':Attribute només pot contenir lletres, números i guions.',
    'alpha_num' => ':Attribute només pot contenir lletres i números.',
    'array' => ':Attribute ha de ser una matriu.',
    'ascii' => 'El :attribute només ha de contenir caràcters i símbols alfanumèrics d\'un sol byte.',
    'before' => ':Attribute ha de ser una data anterior a :date.',
    'before_or_equal' => ':Attribute ha de ser una data anterior o igual a :date.',
    'between' => [
        'array' => ':Attribute ha de tenir entre :min - :max ítems.',
        'file' => ':Attribute ha de pesar entre :min - :max kilobytes.',
        'numeric' => ':Attribute ha d\'estar entre :min - :max.',
        'string' => ':Attribute ha de tenir entre :min - :max caràcters.',
    ],
    'boolean' => 'El camp :attribute ha de ser verdader o fals',
    'can' => 'El camp :attribute conté un valor no autoritzat.',
    'confirmed' => 'La confirmació de :attribute no coincideix.',
    'current_password' => 'La contrasenya és incorrecta.',
    'date' => ':Attribute no és una data vàlida.',
    'date_equals' => 'El :attribute ha de ser una data igual a :date.',
    'date_format' => 'El camp :attribute no concorda amb el format :format.',
    'decimal' => 'El :attribute ha de tenir :decimal decimals.',
    'declined' => 'Els :attribute s\'han de rebutjar.',
    'declined_if' => 'El :attribute s\'ha de rebutjar quan :other és :value.',
    'different' => ':Attribute i :other han de ser diferents.',
    'digits' => ':Attribute ha de tenir :digits dígits.',
    'digits_between' => ':Attribute ha de tenir entre :min i :max dígits.',
    'dimensions' => 'Les dimensions de la imatge :attribute no són vàlides.',
    'distinct' => 'El camp :attribute té un valor duplicat.',
    'doesnt_end_with' => 'El :attribute no pot acabar amb un dels següents: :values.',
    'doesnt_start_with' => 'El :attribute no pot començar amb un dels següents: :values.',
    'email' => ':Attribute no és un e-mail vàlid',
    'ends_with' => 'La :attribute ha d\'acabar amb una de les següents: :values.',
    'enum' => 'El :attribute seleccionat no és vàlid.',
    'exists' => ':Attribute és invàlid.',
    'file' => 'El camp :attribute ha de ser un arxiu.',
    'filled' => 'El camp :attribute és obligatori.',
    'gt' => [
        'array' => 'El :attribute ha de tenir més de :value ítems.',
        'file' => 'El :attribute ha de ser superior a :value kilobytes.',
        'numeric' => 'El :attribute ha de ser superior a :value.',
        'string' => 'El :attribute ha de superar els :value caràcters.',
    ],
    'gte' => [
        'array' => 'El :attribute ha de tenir :value ítems o més.',
        'file' => 'El :attribute ha de ser igual o superior a :value kilobytes.',
        'numeric' => 'El :attribute ha de ser igual o superior a :value.',
        'string' => 'El :attribute ha de ser igual o superior a :value caràcters.',
    ],
    'image' => ':Attribute ha de ser una imatge.',
    'in' => ':Attribute és invàlid',
    'in_array' => 'El camp :attribute no existeix dintre de :other.',
    'integer' => ':Attribute ha de ser un nombre enter.',
    'ip' => ':Attribute ha de ser una adreça IP vàlida.',
    'ipv4' => ':Attribute ha de ser una adreça IPv4 vàlida.',
    'ipv6' => ':Attribute ha de ser una adreça IPv6 vàlida.',
    'json' => 'El camp :attribute ha de ser una cadena JSON vàlida.',
    'lowercase' => 'El :attribute ha d\'anar en minúscula.',
    'lt' => [
        'array' => 'El :attribute ha de tenir menys de :value ítems.',
        'file' => 'El :attribute ha de ser inferior a :value kilobytes.',
        'numeric' => 'El :attribute ha de ser inferior a :value.',
        'string' => 'El :attribute no ha de superar els :value caràcters.',
    ],
    'lte' => [
        'array' => 'El :attribute no ha de tenir més de :value ítems.',
        'file' => 'El :attribute ha de ser igual o inferior a :value kilobytes.',
        'numeric' => 'El :attribute ha de ser igual o inferior a :value.',
        'string' => 'El :attribute ha de ser igual o inferior a :value caràcters.',
    ],
    'mac_address' => 'El :attribute ha de ser una adreça MAC vàlida.',
    'max' => [
        'array' => ':Attribute no pot tenir més de :max ítems.',
        'file' => ':Attribute no pot ser més gran que :max kilobytes.',
        'numeric' => ':Attribute no pot ser més gran que :max.',
        'string' => ':Attribute no pot ser més gran que :max caràcters.',
    ],
    'max_digits' => 'El :attribute no ha de tenir més de :max dígits.',
    'mimes' => ':Attribute ha de ser un arxiu amb format: :values.',
    'mimetypes' => ':Attribute ha de ser un arxiu amb format: :values.',
    'min' => [
        'array' => ':Attribute ha de tenir almenys :min ítems.',
        'file' => 'La mida de :attribute ha de ser d\'almenys :min kilobytes.',
        'numeric' => 'La mida de :attribute ha de ser d\'almenys :min.',
        'string' => ':Attribute ha de contenir almenys :min caràcters.',
    ],
    'min_digits' => 'El :attribute ha de tenir almenys :min dígits.',
    'missing' => 'El camp :attribute ha de faltar.',
    'missing_if' => 'El camp :attribute ha de faltar quan :other és :value.',
    'missing_unless' => 'El camp :attribute ha de faltar, tret que :other sigui :value.',
    'missing_with' => 'El camp :attribute ha de faltar quan hi ha :values.',
    'missing_with_all' => 'El camp :attribute ha de faltar quan n\'hi ha :values.',
    'multiple_of' => 'La :attribute ha de ser un múltiple de :value',
    'not_in' => ':Attribute és invàlid.',
    'not_regex' => 'El format de :attribute no és vàlid.',
    'numeric' => ':Attribute ha de ser numèric.',
    'password' => [
        'letters' => 'El :attribute ha de contenir almenys una lletra.',
        'mixed' => 'El :attribute ha de contenir almenys una lletra majúscula i una minúscula.',
        'numbers' => 'El :attribute ha de contenir almenys un número.',
        'symbols' => 'El :attribute ha de contenir almenys un símbol.',
        'uncompromised' => 'El :attribute donat ha aparegut en una filtració de dades. Si us plau, trieu un :attribute diferent.',
    ],
    'present' => 'El camp :attribute ha d\'existir.',
    'prohibited' => 'La :attribute camp està prohibit.',
    'prohibited_if' => 'La :attribute camp és prohibida quan :other és :value.',
    'prohibited_unless' => 'La :attribute camp és prohibida, tret que :other és en :values.',
    'prohibits' => 'El camp :attribute prohibeix la presència de :other.',
    'regex' => 'El format de :attribute és invàlid.',
    'required' => 'El camp :attribute és obligatori.',
    'required_array_keys' => 'El camp :attribute ha de contenir entrades per a: :values.',
    'required_if' => 'El camp :attribute és obligatori quan :other és :value.',
    'required_if_accepted' => 'El camp :attribute és obligatori quan s\'accepta :other.',
    'required_unless' => 'El camp :attribute és obligatori a no ser que :other sigui a :values.',
    'required_with' => 'El camp :attribute és obligatori quan hi ha :values.',
    'required_with_all' => 'El camp :attribute és obligatori quan hi ha :values.',
    'required_without' => 'El camp :attribute és obligatori quan no hi ha :values.',
    'required_without_all' => 'El camp :attribute és obligatori quan no hi ha cap valor dels següents: :values.',
    'same' => ':Attribute i :other han de coincidir.',
    'size' => [
        'array' => ':Attribute ha de contenir :size ítems.',
        'file' => 'La mida de :attribute ha de ser :size kilobytes.',
        'numeric' => 'La mida de :attribute ha de ser :size.',
        'string' => ':Attribute ha de contenir :size caràcters.',
    ],
    'starts_with' => 'El :attribute ha de començar per un dels valors següents: :values',
    'string' => 'El camp :attribute ha de ser una cadena.',
    'timezone' => 'El camp :attribute ha de ser una zona vàlida.',
    'ulid' => 'El :attribute ha de ser un ULID vàlid.',
    'unique' => ':Attribute ja està registrat i no es pot repetir.',
    'uploaded' => ':Attribute ha fallat al pujar.',
    'uppercase' => 'El :attribute ha d\'anar en majúscula.',
    'url' => ':Attribute no és una adreça web vàlida.',
    'uuid' => 'El :attribute ha de ser un indentificador únic universal (UUID) vàlid.',
    'attributes' => [
        'about'=> 'Sobre mí',
        'address' => 'adreça',
        'age' => 'edat',
        'amount' => 'quantitat',
        'area' => 'zona',
        'available' => 'disponible',
        'birthday' => 'aniversari',
        'body' => 'cos',
        'city' => 'ciutat',
        'content' => 'contingut',
        'country' => 'país',
        'created_at' => 'creat a',
        'creator' => 'creador',
        'current_password' => 'Contrasenya actual',
        'cv' => 'currículum',
        'date' => 'data',
        'date_of_birth' => 'data de naixement',
        'day' => 'dia',
        'deleted_at' => 'esborrat a les',
        'description' => 'descripció',
        'district' => 'districte',
        'duration' => 'durada',
        'email' => 'adreça electrònica',
        'excerpt' => 'extracte',
        'filter' => 'filtre',
        'first_name' => 'nom',
        'gender' => 'gènere',
        'group' => 'grup',
        'hour' => 'hora',
        'image' => 'imatge',
        'last_name' => 'cognom',
        'lesson' => 'lliçó',
        'line_address_1' => 'adreça de línia 1',
        'line_address_2' => 'adreça de línia 2',
        'message' => 'missatge',
        'middle_name' => 'segon nom',
        'minute' => 'minut',
        'mobile' => 'mòbil',
        'month' => 'mes',
        'name' => 'nom',
        'national_code' => 'codi nacional',
        'number' => 'nombre',
        'password' => 'contrasenya',
        'password_confirmation' => 'confirmació de la contrasenya',
        'phone' => 'telèfon',
        'photo' => 'foto',
        'postal_code' => 'Codi Postal',
        'price' => 'preu',
        'province' => 'província',
        'recaptcha_response_field' => 'camp de resposta recaptcha',
        'remember' => 'recorda',
        'restored_at' => 'restaurat a',
        'result_text_under_image' => 'text del resultat sota la imatge',
        'role' => 'paper',
        'second' => 'segon',
        'sex' => 'sexe',
        'short_text' => 'text breu',
        'size' => 'mida',
        'state' => 'estat',
        'street' => 'carrer',
        'student' => 'estudiant',
        'subject' => 'assumpte',
        'subtitle'=> 'subtítol',
        'surname' => 'cognom',
        'teacher' => 'professor',
        'terms' => 'termes',
        'test_description' => 'descripció de la prova',
        'test_locale' => 'localització de prova',
        'test_name' => 'nom de la prova',
        'text' => 'text',
        'time' => 'hora',
        'title' => 'títol',
        'updated_at' => 'actualitzat a',
        'username' => 'usuari',
        'year' => 'any',
    ],
];