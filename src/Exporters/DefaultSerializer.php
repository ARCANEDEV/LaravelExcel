<?php namespace Arcanedev\LaravelExcel\Exporters;

use Arcanedev\LaravelExcel\Contracts\Serializer as SerializerContract;

/**
 * Class     DefaultSerializer
 *
 * @package  Arcanedev\LaravelExcel\Exporter
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DefaultSerializer implements SerializerContract
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the serialized data.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $data
     *
     * @return array
     */
    public function getData($data)
    {
        return $data->toArray();
    }

    /**
     * Get the header.
     *
     * @return array
     */
    public function getHeader()
    {
        return [];
    }
}
