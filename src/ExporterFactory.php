<?php namespace Arcanedev\LaravelExcel;

use Arcanedev\LaravelExcel\Contracts\ExporterManager;
use Arcanedev\Support\Manager;

/**
 * Class     ExporterFactory
 *
 * @package  Arcanedev\LaravelExcel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExporterFactory extends Manager implements ExporterManager
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return 'excel';
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Drivers
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get a exporter instance.
     *
     * @param  string  $driver
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function make($driver)
    {
        return $this->driver($driver);
    }

    /**
     * Get the Excel driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function createExcelDriver()
    {
        return new Exporters\Excel;
    }

    /**
     * Get the CSV driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function createCsvDriver()
    {
        return new Exporters\Csv;
    }

    /**
     * Get the Open office driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function createOpenOfficeDriver()
    {
        return new Exporters\OpenOffice;
    }
}
