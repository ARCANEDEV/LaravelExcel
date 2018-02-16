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
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var string */
    protected $type = Type::XLSX;

    /* -----------------------------------------------------------------
     |  Other Met
     | -----------------------------------------------------------------
     */

    /**
     * Load the writer options.
     */
    protected function loadOptions()
    {
        //
    }
}
