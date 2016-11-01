<?php namespace Arcanedev\LaravelExcel;

use Arcanedev\Support\PackageServiceProvider;

/**
 * Class     LaravelExcelServiceProvider
 *
 * @package  Arcanedev\LaravelExcel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LaravelExcelServiceProvider extends PackageServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Package name.
     *
     * @var string
     */
    protected $package = 'laravel-excel';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the base path of the package.
     *
     * @return string
     */
    public function getBasePath()
    {
        return dirname(__DIR__);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerConfig();
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

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'arcanedev.excel.exporter',
            Contracts\ExporterManager::class,
            'arcanedev.excel.importer',
            Contracts\ImporterManager::class,
        ];
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the exporter manager.
     */
    private function registerExporter()
    {
        $this->singleton('arcanedev.excel.exporter', function ($app) {
            return new ExporterFactory($app);
        });
        $this->bind(Contracts\ExporterManager::class, 'arcanedev.excel.exporter');
    }

    /**
     * Register the importer manager.
     */
    private function registerImporter()
    {
        $this->singleton('arcanedev.excel.importer', function ($app) {
            return new ImporterFactory($app);
        });
        $this->bind(Contracts\ImporterManager::class, 'arcanedev.excel.importer');
    }
}
