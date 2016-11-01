<?php namespace Arcanedev\LaravelExcel\Contracts;

/**
 * Interface  ExporterManager
 *
 * @package   Arcanedev\LaravelExcel\Contracts
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface ExporterManager
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get a exporter instance.
     *
     * @param  string  $driver
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function make($driver);
}
