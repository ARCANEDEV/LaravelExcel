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
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $type = Type::CSV;
}
