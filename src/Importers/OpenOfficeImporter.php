<?php namespace Arcanedev\LaravelExcel\Importers;

use Box\Spout\Common\Type;

/**
 * Class     OpenOfficeImporter
 *
 * @package  Arcanedev\LaravelExcel\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OpenOfficeImporter extends AbstractImporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $type = Type::ODS;
}
