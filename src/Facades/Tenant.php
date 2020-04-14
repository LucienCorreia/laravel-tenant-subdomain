<?php

namespace Multiplier\Tenant\Facades;
use Illuminate\Support\Facades\Facade;

class Tenant extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'tenant.manager';
    }
}
