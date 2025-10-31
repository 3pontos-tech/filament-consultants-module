<?php

use TresPontosTech\Consultant\Core\Models\Consultant;

/*
|--------------------------------------------------------------------------
| TresPontosTech Consultant Module
|--------------------------------------------------------------------------
|
| This config file follows the goal to implement the internal package of our
| consultants module. It's not intended to be used in any other context,
| however, we need to keep it modular for the future implementations.
|
*/
return [
    'consultants' => [
        'ui' => [
            'navigation_group' => 'Consultores',
            'navigation_label' => 'Gerenciar Consultores',
            'label' => 'Consultor',
        ],
        'models' => [
            'consultant' => Consultant::class,
        ],
        'database' => [
            'tables' => [
                'consultants' => 'consultants',
            ],
            'connection' => env('DB_BACKOFFICE_CONNECTION', env('DB_CONNECTION', 'sqlite')),
            'db_name' => env('DB_BACKOFFICE_CONNECTION', env('DB_CONNECTION', 'sqlite')),
        ],
    ],
];
