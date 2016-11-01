<?php namespace Arcanedev\LaravelExcel;

use Arcanedev\LaravelExcel\Contracts\ImporterManager;
use Arcanedev\Support\Manager;

/**
 * Class     ImporterFactory
 *
 * @package  Arcanedev\LaravelExcel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ImporterFactory extends Manager implements ImporterManager
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
     * Get a importer instance.
     *
     * @param  string  $driver
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Importer
     */
    public function make($driver)
    {
        return $this->driver($driver);
    }

    /**
     * Get the Excel driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Importers\Excel
     */
    public function createExcelDriver()
    {
        return new Importers\Excel;
    }

    /**
     * Get the CSV driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Importers\Csv
     */
    public function createCsvDriver()
    {
        return new Importers\Csv;
    }

    /**
     * Get the Open office driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Importers\OpenOffice
     */
    public function createOpenOfficeDriver()
    {
        return new Importers\OpenOffice;
    }
}
