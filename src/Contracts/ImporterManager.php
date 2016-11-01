<?php namespace Arcanedev\LaravelExcel\Contracts;

/**
 * Interface  ImporterManager
 *
 * @package   Arcanedev\LaravelExcel\Contracts
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface ImporterManager
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get a importer instance.
     *
     * @param  string  $driver
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Importer
     */
    public function make($driver);
}
