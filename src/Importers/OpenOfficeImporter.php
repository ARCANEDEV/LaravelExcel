<?php namespace Arcanedev\LaravelExcel\Importers;

use Box\Spout\Common\Type;
use Illuminate\Support\Arr;

/**
 * Class     OpenOfficeImporter
 *
 * @package  Arcanedev\LaravelExcel\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OpenOfficeImporter extends AbstractImporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  string */
    protected $type = Type::ODS;

    /** @var \Box\Spout\Reader\ODS\Reader */
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
