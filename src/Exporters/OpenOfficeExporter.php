<?php namespace Arcanedev\LaravelExcel\Exporters;

use Box\Spout\Common\Type;

/**
 * Class     OpenOfficeExporter
 *
 * @package  Arcanedev\LaravelExcel\Exporter
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OpenOfficeExporter extends AbstractExporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $type = Type::ODS;
}
