<?php

namespace A4anthony\Cartavel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Cartavel
 *
 * @package A4anthony\Cartavel\Facades
 */
class Cartavel extends Facade
{
    /**
     * Get the registered name of the component
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'cartavel';
    }
}
