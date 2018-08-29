<?php namespace Arcanedev\LaravelExcel\Importers;

use Box\Spout\Common\Type;

/**
 * Class     ExcelImporter
 *
 * @package  Arcanedev\LaravelExcel\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExcelImporter extends AbstractImporter
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $type = Type::XLSX;

    /** @var \Box\Spout\Reader\XLSX\Reader */
    protected $reader;

    /* -----------------------------------------------------------------
     |  Other Functions
     | -----------------------------------------------------------------
     */

    /**
     * Load the reader options.
     */
    protected function loadOptions()
    {
        $this->reader
             ->setShouldFormatDates($this->getOption('format-dates', false))
             ->setShouldPreserveEmptyRows($this->getOption('preserve-empty-rows', false));
    }
}
