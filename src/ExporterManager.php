<?php namespace Arcanedev\LaravelExcel;

use Arcanedev\LaravelExcel\Contracts\ExporterManager as ExporterManagerContract;

/**
 * Class     ExporterManager
 *
 * @package  Arcanedev\LaravelExcel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExporterManager extends AbstractManager implements ExporterManagerContract
{
    /* -----------------------------------------------------------------
     |  Main Drivers
     | -----------------------------------------------------------------
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
        return $this->buildExporter('excel');
    }

    /**
     * Get the CSV driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function createCsvDriver()
    {
        return $this->buildExporter('csv');
    }

    /**
     * Get the Open office driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function createOpenOfficeDriver()
    {
        return $this->buildExporter('ods');
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Build the exporter.
     *
     * @param  string  $driver
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    protected function buildExporter($driver)
    {
        return $this->app->makeWith(
            $this->getDriverExporter($driver),
            $this->getDriverOptions($driver)
        );
    }
}
