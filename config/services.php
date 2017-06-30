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
        'model' => App\Eloquent\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '138792040026231',
        'client_secret' => '0fc6a7d2fed575e3b3205cce02ad8680',
        'redirect' => env('APP_URL') . 'callback/facebook',
    ],

    // API for Hosting
    // 'facebook' => [
    //     'client_id' => '316547422130910',
    //     'client_secret' => '0c1324f1af172940b311a032c8e26933',
    //     'redirect' => env('APP_URL') . 'callback/facebook',
    // ],

    'google' => [
        'client_id' => '733547052003-2ltnfps007hdntsej5vsalf9cla212ns.apps.googleusercontent.com',
        'client_secret' => 'VQKaxzEY_lqLox_C03j9k3MA',
        'redirect' => env('APP_URL') . 'callback/google',
    ],

    // API for Hosting
    // 'google' => [
    //     'client_id' => '219505973432-43up07mneju6jfj6qtqpb47cjbjvdju9.apps.googleusercontent.com',
    //     'client_secret' => 'KyV9mm6BS-_9nFy_AfhWSkpc',
    //     'redirect' => env('APP_URL') . 'callback/google',
    // ],
];
