<?php namespace Arcanedev\LaravelExcel\Exporters;

use Box\Spout\Common\Type;

/**
 * Class     ExcelExporter
 *
 * @package  Arcanedev\LaravelExcel\Exporter
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExcelExporter extends AbstractExporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $type = Type::XLSX;
}
