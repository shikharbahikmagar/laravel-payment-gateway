<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Payment Gateway
    |--------------------------------------------------------------------------
    |
    | This option controls the default payment gateway that will be used by
    | the PaymentManager when no specific gateway is selected.
    |
    */

    'default' => env('PAYMENT_DEFAULT', 'khalti'),

    /*
    |--------------------------------------------------------------------------
    | Payment Gateway Credentials
    |--------------------------------------------------------------------------
    |
    | Place your API keys or other credentials for each gateway here.
    |
    */

    'gateways' => [

        'khalti' => [
            'public_key' => env('KHALTI_PUBLIC_KEY', ''),
            'secret_key' => env('KHALTI_SECRET_KEY', ''),
        ],

        'esewa' => [
            'merchant_id' => env('ESEWA_MERCHANT_ID', ''),
            'secret_key' => env('ESEWA_SECRET_KEY', ''),
        ],

    ],

];
