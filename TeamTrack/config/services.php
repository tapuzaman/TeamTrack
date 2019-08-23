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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],


    //Custom socialite Google
    'google' => [
        'client_id' => '403614899305-6cfso601ln06vgfj0q97pa07o937jpr7.apps.googleusercontent.com',//  Google Client ID
        'client_secret' => '_GGl9TizcJLMdnj_1HExK2GC', //  Google Client Secret
        'redirect' => 'http://teamtrack.me/auth/google/callback',  //  Google Callback URL
    ],

//custom linkedin socialite
    'linkedin' => [
        'client_id' => '81443bvg63sw4g',         //  LinkedIn Client ID
        'client_secret' => 'odctdyYtimenSJzx', //  LinkedIn Client Secret
        'redirect' => 'http://teamtrack.me/auth/linkedin/callback',       //  LinkedIn Callback URL
    ],


];
