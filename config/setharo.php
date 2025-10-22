<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Setharo API URL
    |--------------------------------------------------------------------------
    |
    | This is the base URL of the Setharo API. Defaults to the official
    | Setharo API endpoint but can be overridden in your .env file.
    |
    */

    'api_url' => env('SETHARO_API_URL', 'https://chat.systimo.org'),

    /*
    |--------------------------------------------------------------------------
    | Setharo API Key
    |--------------------------------------------------------------------------
    |
    | Set your API key for sending errors and system messages to Setharo.
    | You can get this key from the Setharo dashboard.
    |
    */

    'api_key' => env('SETHARO_API_KEY', ''),
];
