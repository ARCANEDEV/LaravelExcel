<?php namespace Arcanedev\LaravelExcel\Importers;

use Box\Spout\Common\Type;
use Illuminate\Support\Arr;

/**
 * Class     ExcelImporter
 *
 * @package  Arcanedev\LaravelExcel\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExcelImporter extends AbstractImporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  string */
    protected $type = Type::XLSX;

    /** @var \Box\Spout\Reader\XLSX\Reader */
    protected $reader;

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Load the reader options.
     */
    protected function loadOptions()
    {
        $this->reader
            ->setShouldFormatDates(
                Arr::get($this->options, 'format-dates', false)
            )
            ->setShouldPreserveEmptyRows(
                Arr::get($this->options, 'preserve-empty-rows', false)
            );
    }
}
