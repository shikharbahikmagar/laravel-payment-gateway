<?php

namespace Shikhar\Payments\Facades;

use Illuminate\Support\Facades\Facade;

class Payment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'payment'; // This matches the singleton binding in the ServiceProvider
    }
}
