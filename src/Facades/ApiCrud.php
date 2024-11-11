<?php

namespace ApiCrud\ApiCrud\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ApiCrud\ApiCrud\ApiCrud
 */
class ApiCrud extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ApiCrud\ApiCrud\ApiCrud::class;
    }
}
