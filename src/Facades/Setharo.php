<?php

namespace Setharo\Facades;

use Illuminate\Support\Facades\Facade;

class Setharo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Setharo\Setharo::class;
    }
}
