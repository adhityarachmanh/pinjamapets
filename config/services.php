<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '464134961084726',
        'client_secret' => '6f2b444450fdbc0b4f9cb4ae80448678',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '244547341344-oudh450piamdnorj3ctmtv4868rvtqv7.apps.googleusercontent.com',
        'client_secret' => '3KH5C6aFGgMrN7gXicljayle',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
    'instagram' => [
        'client_id' => '5eb4de332d9f4f51a7f4c13ab766d719',
        'client_secret' => 'aa3ab80dc113480a832a887a7e229053',
        'redirect' => 'http://localhost:8000/login/instagram/callback',
    ],

];
