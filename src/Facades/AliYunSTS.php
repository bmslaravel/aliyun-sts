<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean bmsLaravel <18200172438@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bms\Facades;

use Illuminate\Support\Facades\Facade;

class AliYunSTS
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
