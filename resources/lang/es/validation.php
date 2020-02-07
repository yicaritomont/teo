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

    'accepted'             => 'El :attribute debe ser aceptado.',
    'active_url'           => 'El :attribute no es una URL valida.',
    'after'                => 'El :attribute debe ser una fecha después :date.',
    'after_or_equal'       => 'El :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'El :attribute solo puede contener letras.',
    'alpha_dash'           => 'El :attribute solo puede contener letras, números y guiones.',
    'alpha_num'            => 'El :attribute solo puede contener letras y números.',
    'array'                => 'El :attribute debe ser una matriz.',
    'before'               => 'El :attribute debe ser una fecha antes :date.',
    'before_or_equal'      => 'El :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El :attribute debe estar entre  :min y :max.',
        'file'    => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El :attribute debe estar entre :min y :max caracteres.',
        'array'   => 'El :attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => 'El :attribute el campo debe ser verdadero o falso.',
    'confirmed'            => 'El :attribute la confirmación no coincide.',
    'date'                 => 'El campo :attribute no es una fecha válida.',
    'date_format'          => 'El :attribute no coincide con el formato :format.',
    'different'            => 'El :attribute y :other debe ser diferente.',
    'digits'               => 'El :attribute debe ser :digits digitos.',
    'digits_between'       => 'El :attribute debe estar entre :min y :max digitos.',
    'dimensions'           => 'El :attribute tiene dimensiones de imagen inválidas.',
    'distinct'             => 'El :attribute campo tiene un valor duplicado.',
    'email'                => 'El :attribute Debe ser una dirección de correo electrónico válida.',
    'exists'               => 'El :attribute seleccionado es inválido.',
    'file'                 => 'El :attribute debe ser un archivo.',
    'filled'               => 'El :attribute campo debe tener un valor.',
    'image'                => 'El :attribute debe ser una imagen.',
    'in'                   => 'El :attribute seleccionado es inválido.',
    'in_array'             => 'El :attribute campo no existe en :other.',
    'integer'              => 'El :attribute debe ser un entero.',
    'ip'                   => 'El :attribute debe ser una dirección IP válida.',
    'json'                 => 'El :attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file'    => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string'  => 'El :attribute no puede ser mayor que :max caracteres.',
        'array'   => 'El :attribute no puede tener más de :max items.',
    ],
    'mimes'                => 'El :attribute debe ser un archivo de tipo :values.',
    'mimetypes'            => 'El :attribute debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => 'El :attribute al menos debe ser :min.',
        'file'    => 'El :attribute al menos debe ser :min kilobytes.',
        'string'  => 'El :attribute al menos debe ser :min caracteres.',
        'array'   => 'El :attribute debe tener al menos :min items.',
    ],
    'not_in'               => 'El :attribute seleccionado es inválido.',
    'numeric'              => 'El :attribute tiene que ser un número.',
    'present'              => 'El :attribute campo debe estar presente.',
    'regex'                => 'El :attribute el formato no es válido.',
    'required'             => 'El campo :attribute  es requerido.',
    'required_if'          => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other es in :values.',
    'required_with'        => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es requerido cuando :values está presente.',
    'required_without'     => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de :values están presentes.',
    'same'                 => 'El :attribute y :other deben coincidir .',
    'size'                 => [
        'numeric' => 'El :attribute debe ser :size.',
        'file'    => 'El :attribute debe ser :size kilobytes.',
        'string'  => 'El :attribute debe ser :size caracteres.',
        'array'   => 'El :attribute debe contener :size items.',
    ],
    'string'               => 'El :attribute debe ser una cadena.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => 'El :attribute ya se ha tomado.',
    'uploaded'             => 'El :attribute no se pudo cargar.',
    'url'                  => 'El :attribute el formato no es válido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],
    'PermissionTake' => 'Permiso ya ha sido tomado',
    'PermissionAdmin' => 'Permisos de administrador actualizados.',
    'MessageCreated' => 'Se ha realizado la acción existosamente',
    'MessageError' => 'No se puede completar la acción',
    'ChangePasswordMissing' => 'Por favor, escriba una nueva contraseña',
    'attributes' => [
        'name' => 'Nombre',
        'client_id' => 'Cliente',
        'cities_id' => 'Ciudad',
        'address' => 'Dirección',
        'slug' => 'Ficha',
        'email' => 'Correo',
        'password' => 'Contraseña',
        'roles' => 'Roles',
        'companies' => 'Compañías',
        'lastname' => 'Apellido',
        'phone' => 'Teléfono',
        'cell_phone' => 'Celular',
        'activity' => 'Actividad',
        'date' => 'Fecha',
        'start_time' => 'Hora de inicio',
        'end_time' => 'Hora final',
        'inspector_id' => 'Inspectores',
        'headquarters_id' => 'Sedes',
        'identification' => 'Identificación',
        'company_id' => 'Compañía',
        'country' => 'País',
        'city_id' => 'Ciudad',
        'start_date' => 'Fecha de inicio',
        'end_date' => 'Fecha final',
        'inspection_type_id' => 'Tipo de Inspección',
        'inspection_subtype_id' => 'Subtipo de Inpección',
        'contract_id' => 'Contrato',
        'estimated_start_date' => 'Fecha de inicio',
        'estimated_end_date' => 'Fecha final',
        'menu_id' => 'Menú padre',
    ],

    /*  Verificacion para uso de contraseñas */
    'PasswordHas' => 'La contraseña debe tener al menos',
    'PasswordLength' => 'La contraseña debe tener una longitud mínima de ',
    'Number' => 'números',
    'Character' => 'caracteres',
    'Lower' => 'minúsculas',
    'Upper' => 'mayúsculas',
    'beforePass' => 'La contraseña ya fue usada anteriormente, debe registrar una nueva.',
    'keyWordPass' => 'La contraseña no puede contener palabras claves de su usuario.',
];
