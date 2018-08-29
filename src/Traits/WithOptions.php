<?php namespace Arcanedev\LaravelExcel\Traits;

use Illuminate\Support\Arr;

/**
 * Trait     WithOptions
 *
 * @package  Arcanedev\LaravelExcel\Traits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait WithOptions
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $options = [];

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get all the options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get an option.
     *
     * @param  string  $key
     * @param  mixed   $default
     *
     * @return mixed
     */
    public function getOption($key, $default = null)
    {
        return Arr::get($this->getOptions(), $key, $default);
    }

    /**
     * Set the options.
     *
     * @param  array  $options
     *
     * @return self
     */
    public function setOptions(array $options)
    {
        return $this->resetOptions(
            array_merge($this->getOptions(), $options)
        );
    }

    /**
     * Set an option.
     *
     * @param  string  $key
     * @param  mixed   $value
     *
     * @return self
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * Reset the options.
     *
     * @param  array  $options
     *
     * @return self
     */
    public function resetOptions(array $options = [])
    {
        $this->options = $options;

        return $this;
    }
}
