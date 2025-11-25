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
      'form_url' => 'https://rc-epay.esewa.com.np/api/epay/main/v2/form',
      'merchant_id' => env('ESEWA_MERCHANT_ID', 'EPAYTEST'),
      'secret_key' => env('ESEWA_SECRET_KEY', '8gBm/:&EnhH.1/q'),
    ],

  ],

];
