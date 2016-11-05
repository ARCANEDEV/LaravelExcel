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
            );
    }
}
