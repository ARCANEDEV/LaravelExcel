<?php namespace Arcanedev\LaravelExcel;

use Arcanedev\LaravelExcel\Contracts\ImporterManager as ImporterManagerContract;
use Arcanedev\Support\Manager;

/**
 * Class     ImporterManager
 *
 * @package  Arcanedev\LaravelExcel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ImporterManager extends Manager implements ImporterManagerContract
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
        return $this->app['config']->get('laravel-excel.default');
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
        return new Importers\ExcelImporter(
            $this->getDriverOptions('excel')
        );
    }

    /**
     * Get the CSV driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Importers\CsvImporter
     */
    public function createCsvDriver()
    {
        return new Importers\CsvImporter(
            $this->getDriverOptions('csv')
        );
    }

    /**
     * Get the Open office driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Importers\OpenOfficeImporter
     */
    public function createOpenOfficeDriver()
    {
        return new Importers\OpenOfficeImporter(
            $this->getDriverOptions('ods')
        );
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the driver options.
     *
     * @param  string  $driver
     *
     * @return array
     */
    protected function getDriverOptions($driver)
    {
        return $this->app['config']->get("laravel-excel.drivers.$driver.options", []);
    }
}
