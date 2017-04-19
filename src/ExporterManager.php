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
        return new Exporters\ExcelExporter(
            $this->getDriverOptions('excel')
        );
    }

    /**
     * Get the CSV driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function createCsvDriver()
    {
        return new Exporters\CsvExporter(
            $this->getDriverOptions('csv')
        );
    }

    /**
     * Get the Open office driver instance.
     *
     * @return \Arcanedev\LaravelExcel\Contracts\Exporter
     */
    public function createOpenOfficeDriver()
    {
        return new Exporters\OpenOfficeExporter(
            $this->getDriverOptions('ods')
        );
    }
}
