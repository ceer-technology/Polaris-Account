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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // Third-party account Support 第三方账户支持
    // 功能总开关
    'socialLogins' => [
        'enabled' => env('SocialLogins_ENABLED', false),
    ],

    // QQ
    'qq' => [
        'enabled' => env('QQ_ENABLED', false),
        'client_id' => env('QQ_CLIENT_ID'),
        'client_secret' => env('QQ_CLIENT_SECRET'),
        'redirect' => env('QQ_REDIRECT_URI'),
    ],

    // Wechat(weixin)
    'weixin' => [
        'enabled' => env('WEIXIN_ENABLED', false),
        'client_id' => env('WEIXIN_CLIENT_ID'),
        'client_secret' => env('WEIXIN_CLIENT_SECRET'),
        'redirect' => env('WEIXIN_REDIRECT_URI'),
    ],

    // Github
    'github' => [
        'enabled' => env('GITHUB_ENABLED', false),
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDIRECT_URI'),
    ],

];
