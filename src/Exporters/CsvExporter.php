<?php namespace Arcanedev\LaravelExcel\Exporters;

use Box\Spout\Common\Type;

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
             ->setFieldDelimiter($this->getOption('field-delimiter', ';'))
             ->setFieldEnclosure($this->getOption('field-enclosure', '"'))
             ->setShouldAddBOM($this->getOption('add-bom', true));
    }
}
