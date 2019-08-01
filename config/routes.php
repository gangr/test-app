<?php

$routes = [
    '/' => [
        'controller' => 'Main',
        'action' => 'index',
        'styles' => [
            'main'
        ],
        'scripts' => [
            'main'
        ],
    ],
    'admin' => [
        'controller' => 'Admin',
        'action' => 'index',
        'styles' => [
            'admin'
        ],
        'scripts' => [
            'admin'
        ],
    ],
    'admin/delete' => [
        'controller' => 'Admin',
        'action' => 'delete'
    ],
];
