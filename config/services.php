<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'ip_api'=> env('IP_API_KEY'),
    'ipdata'=> env('IP_DATA_KEY'),
    'flutter_public_key' => env('FLUTTER_PUBLIC_KEY'),
    'flutter_test_public_key' => env('FLUTTER_TEST_PUBLIC_KEY'),
    'flutter_secret_key' => env('FLUTTER_SECRET_KEY'),
    'flutter_test_secret_key' => env('FLUTTER_TEST_SECRET_KEY'),


];
