<?php

return [
    'domain' => env('DOMAIN', 'localhost.local'),
    'login_expire' => env('LOGIN_EXPIRE', 120),
    'name' => env('TITLE_ADMIN_NAME', 'Administrator'),
    'perPage' => 10,
    'languages_name' => [
        'jp' => 'Japanese',
        'en' => 'English',
        'vi' => 'Vietnamese'
    ],
    'app_locale' => env('APP_LOCALE', 'en'),
];
