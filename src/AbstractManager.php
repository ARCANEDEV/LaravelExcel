<?php namespace Arcanedev\LaravelExcel;

use Illuminate\Support\Manager;

/**
 * Class     AbstractManager
 *
 * @package  Arcanedev\LaravelExcel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractManager extends Manager
{
    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']->get('excel.default');
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the driver options.
     *
     * @param  string  $driver
     *
     * @return array
     */
    protected function getDriverOptions($driver)
    {
        return $this->app['config']->get("excel.drivers.$driver.options", []);
    }
}
