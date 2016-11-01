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
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $type = Type::CSV;
}
