<?php

return [
    'site' => [
        'all' => ['main', 'post'],
        'admin' => [],
    ],

    'admin' => [
        'all' => [],
        'admin' => ['main', 'formHandler', 'deletePost'],
    ],
];
