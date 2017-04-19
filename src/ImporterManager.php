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
}
