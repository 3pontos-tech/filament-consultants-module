<?php

// config for TresPontosTech/Consultant
use TresPontosTech\Consultant\Core\Models\Consultant;

return [
    'consultants' => [
        'models' => [
            'consultant' => Consultant::class,
        ],
        'database' => [
            'table' => [
                'consultants' => 'consultants',
            ],
        ],
        'connection' => app()->isProduction() ? 'backoffice' : config('database.default'),
    ],
];
