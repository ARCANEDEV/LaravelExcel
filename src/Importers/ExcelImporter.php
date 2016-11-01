<?php namespace Arcanedev\LaravelExcel\Importers;

use Box\Spout\Common\Type;

/**
 * Class     ExcelImporter
 *
 * @package  Arcanedev\LaravelExcel\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExcelImporter extends AbstractImporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $type = Type::XLSX;
}
