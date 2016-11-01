<?php namespace Arcanedev\LaravelExcel\Contracts;

/**
 * Interface  DefaultSerializer
 *
 * @package   Arcanedev\LaravelExcel\Contracts
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Serializer
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the serialized data.
     *
     * @param  mixed  $data
     *
     * @return array
     */
    public function getData($data);

    /**
     * Get the header.
     *
     * @return array
     */
    public function getHeader();
}
