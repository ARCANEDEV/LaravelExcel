<?php namespace Arcanedev\LaravelExcel;

use Arcanedev\Support\ServiceProvider;

/**
 * Class     LaravelExcelServiceProvider
 *
 * @package  Arcanedev\LaravelExcel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LaravelExcelServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerExporter();
        $this->registerImporter();
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        //
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    private function registerExporter()
    {
        $this->singleton('arcanedev.excel.exporter', function ($app) {
            return new ExporterFactory($app);
        });
        $this->bind(Contracts\ExporterManager::class, 'arcanedev.excel.exporter');
    }

    private function registerImporter()
    {
        $this->singleton('arcanedev.excel.importer', function ($app) {
            return new ImporterFactory($app);
        });
        $this->bind(Contracts\ImporterManager::class, 'arcanedev.excel.importer');
    }
}
