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
     * Get the config repository.
     *
     * @return \Illuminate\Contracts\Config\Repository
     */
    protected function config()
    {
        return $this->app['config'];
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->config()->get('excel.default');
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the driver's exporter class.
     *
     * @param  string  $driver
     *
     * @return string
     */
    protected function getDriverExporter($driver)
    {
        return $this->config()->get("excel.drivers.$driver.exporter");
    }

    /**
     * Get the driver's importer class.
     *
     * @param  string  $driver
     *
     * @return string
     */
    protected function getDriverImporter($driver)
    {
        return $this->config()->get("excel.drivers.$driver.importer");
    }

    /**
     * Get the driver options.
     *
     * @param  string  $driver
     *
     * @return array
     */
    protected function getDriverOptions($driver)
    {
        return $this->config()->get("excel.drivers.$driver.options", []);
    }
}
