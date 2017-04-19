<?php namespace Arcanedev\LaravelExcel\Exporters;

use Box\Spout\Common\Type;
use Illuminate\Support\Arr;

/**
 * Class     CsvExporter
 *
 * @package  Arcanedev\LaravelExcel\Exporter
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CsvExporter extends AbstractExporter
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var string */
    protected $type = Type::CSV;

    /** @var \Box\Spout\Writer\CSV\Writer */
    protected $writer;

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Load the writer options.
     */
    protected function loadOptions()
    {
        $this->writer
            ->setFieldDelimiter(
                Arr::get($this->options, 'field-delimiter', ';')
            )
            ->setFieldEnclosure(
                Arr::get($this->options, 'field-enclosure', '"')
            )
            ->setShouldAddBOM(
                Arr::get($this->options, 'add-bom', true)
            );
    }
}
