<?php namespace Arcanedev\LaravelExcel\Contracts;

use Illuminate\Support\Collection;

/**
 * Interface  Exporter
 *
 * @package   Arcanedev\LaravelExcel\Contracts
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Exporter
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Set the serializer.
     *
     * @param  \Arcanedev\LaravelExcel\Contracts\Serializer  $serializer
     *
     * @return self
     */
    public function setSerializer(Serializer $serializer);

    /**
     * Get the file type.
     *
     * @return string
     */
    public function getType();

    /**
     * Set the writer options.
     *
     * @param  array  $options
     *
     * @return self
     */
    public function setOptions(array $options);

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Load the data.
     *
     * @param  Collection  $data
     *
     * @return self
     */
    public function load(Collection $data);

    /**
     * Save the data to a file.
     *
     * @param  string  $filename
     */
    public function save($filename);
}
