<?php namespace Arcanedev\LaravelExcel\Contracts;

/**
 * Interface  Importer
 *
 * @package   Arcanedev\LaravelExcel\Contracts
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Importer
{
    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Set the path.
     *
     * @param  string  $path
     *
     * @return self
     */
    public function setPath($path);

    /**
     * Set the sheet number.
     *
     * @param  int  $sheet
     *
     * @return self
     */
    public function setSheet($sheet);

    /**
     * Set the parser.
     *
     * @param  \Arcanedev\LaravelExcel\Contracts\Parser  $parser
     *
     * @return self
     */
    public function setParser(Parser $parser);

    /**
     * Get the file type.
     *
     * @return string
     */
    public function getType();

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Load the file.
     *
     * @param  string  $path
     *
     * @return self
     */
    public function load($path);

    /**
     * Get the parsed data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function get();

    /**
     * Get the parsed data for all sheets.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all();
}
