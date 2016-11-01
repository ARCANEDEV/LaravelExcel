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
    /**
     * Transform the parsed data.
     *
     * @param  array  $row
     *
     * @return mixed
     */
    public function transform(array $row);
}
