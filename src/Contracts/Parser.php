<?php namespace Arcanedev\LaravelExcel\Contracts;

/**
 * Interface  DefaultParser
 *
 * @package   Arcanedev\LaravelExcel\Contracts
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Parser
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function transform($array);
}
