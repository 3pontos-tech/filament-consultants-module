<?php

namespace TresPontosTech\Consultant\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TresPontosTech\Consultant\Core\Models\Consultant
 */
class Consultant extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \TresPontosTech\Consultant\Core\Models\Consultant::class;
    }
}
