<?php namespace Arcanedev\LaravelExcel\Importers;

use Box\Spout\Common\Type;

/**
 * Class     CsvImporter
 *
 * @package  Arcanedev\LaravelExcel\Importer
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CsvImporter extends AbstractImporter
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $type = Type::CSV;

    /** @var \Box\Spout\Reader\CSV\Reader */
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
             ->setFieldDelimiter($this->getOption('field-delimiter', ','))
             ->setFieldEnclosure($this->getOption('field-enclosure', '"'))
             ->setEndOfLineCharacter($this->getOption('eol-character', "\n"))
             ->setEncoding($this->getOption('encoding', 'UTF-8'))
             ->setShouldPreserveEmptyRows($this->getOption('preserve-empty-rows', false));
    }
}
