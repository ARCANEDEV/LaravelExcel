<?php namespace Arcanedev\LaravelExcel\Importers;

use Arcanedev\LaravelExcel\Contracts\Parser as ParserContract;

/**
 * Class     DefaultParser
 *
 * @package  Arcanedev\LaravelExcel\DefaultParser
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DefaultParser implements ParserContract
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function transform($row)
    {
        return $row;
    }
}
