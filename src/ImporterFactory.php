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
        return $this->app['config']['laravel-excel.default'];
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
     * @return \Arcanedev\LaravelExcel\Importers\ExcelImporter
     */
    public function createExcelDriver()
    {
        return new Importers\ExcelImporter;
    }

    /**
     * Get the CSV driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Importers\CsvImporter
     */
    public function createCsvDriver()
    {
        return new Importers\CsvImporter;
    }

    /**
     * Get the Open office driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Importers\OpenOfficeImporter
     */
    public function createOpenOfficeDriver()
    {
        return new Importers\OpenOfficeImporter;
    }
}
