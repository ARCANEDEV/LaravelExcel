<?php namespace Arcanedev\LaravelExcel\Exporters;

use Box\Spout\Common\Type;

/**
 * Class     Excel
 *
 * @package  Arcanedev\LaravelExcel\Exporter
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Excel extends AbstractExporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $type = Type::XLSX;
}
