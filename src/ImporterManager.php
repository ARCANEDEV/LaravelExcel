<?php namespace Arcanedev\LaravelExcel;

use Arcanedev\LaravelExcel\Contracts\ImporterManager as ImporterManagerContract;

/**
 * Class     ImporterManager
 *
 * @package  Arcanedev\LaravelExcel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ImporterManager extends AbstractManager implements ImporterManagerContract
{
    /* -----------------------------------------------------------------
     |  Main Drivers
     | -----------------------------------------------------------------
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
     * @return \Arcanedev\LaravelExcel\Contracts\Importer
     */
    public function createExcelDriver()
    {
        return $this->buildImporter('excel');
    }

    /**
     * Get the CSV driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Importer
     */
    public function createCsvDriver()
    {
        return $this->buildImporter('csv');
    }

    /**
     * Get the Open office driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Importer
     */
    public function createOpenOfficeDriver()
    {
        return $this->buildImporter('ods');
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Build the importer.
     *
     * @param  string  $driver
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Importer
     */
    protected function buildImporter($driver)
    {
        return $this->app->makeWith(
            $this->getDriverImporter($driver),
            $this->getDriverOptions($driver)
        );
    }
}
