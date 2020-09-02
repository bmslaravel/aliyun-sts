<?php

namespace Helium\Sts\Facades;

use Illuminate\Support\Facades\Facade;

class AliYunSTS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'aliyun.sts';
    }
}
