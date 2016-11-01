<?php namespace Arcanedev\LaravelExcel\Importers;

use Box\Spout\Common\Type;

/**
 * Class     Csv
 *
 * @package  Arcanedev\LaravelExcel\Importer
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Csv extends AbstractImporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $type = Type::CSV;
}
