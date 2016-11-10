<?php namespace Arcanedev\LaravelExcel\Importers;

use Box\Spout\Common\Type;
use Illuminate\Support\Arr;

/**
 * Class     CsvImporter
 *
 * @package  Arcanedev\LaravelExcel\Importer
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CsvImporter extends AbstractImporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  string */
    protected $type = Type::CSV;

    /** @var \Box\Spout\Reader\CSV\Reader */
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
            ->setFieldDelimiter(
                Arr::get($this->options, 'field-delimiter', ',')
            )
            ->setFieldEnclosure(
                Arr::get($this->options, 'field-enclosure', '"')
            )
            ->setEndOfLineCharacter(
                Arr::get($this->options, 'eol-character', "\n")
            )
            ->setEncoding(
                Arr::get($this->options, 'encoding', 'UTF-8')
            )
            ->setShouldPreserveEmptyRows(
                Arr::get($this->options, 'preserve-empty-rows', false)
            );
    }
}
