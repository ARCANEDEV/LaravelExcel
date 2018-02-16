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
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * Package name.
     *
     * @var string
     */
    protected $package = 'excel';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer   = true;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->registerConfig();
        $this->registerExporterManager();
        $this->registerImporterManager();
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Contracts\ExporterManager::class,
            Contracts\ImporterManager::class,
        ];
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the exporter manager.
     */
    private function registerExporterManager()
    {
        $this->singleton(Contracts\ExporterManager::class, function ($app) {
            return new ExporterManager($app);
        });
    }

    /**
     * Register the importer manager.
     */
    private function registerImporterManager()
    {
        $this->singleton(Contracts\ImporterManager::class, function ($app) {
            return new ImporterManager($app);
        });
    }
}
