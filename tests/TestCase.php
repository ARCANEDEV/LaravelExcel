<?php namespace Arcanedev\LaravelExcel\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Class     TestCase
 *
 * @package  Arcanedev\LaravelExcel\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    protected function setUp()
    {
        parent::setUp();

        $this->app->loadDeferredProviders();
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Arcanedev\LaravelExcel\LaravelExcelServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Exporter' => \Arcanedev\LaravelExcel\Facades\Exporter::class,
            'Importer' => \Arcanedev\LaravelExcel\Facades\Importer::class,
        ];
    }


    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
        //
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the file from fixtures folder.
     *
     * @param  string  $filename
     *
     * @return string
     */
    protected function getFixture($filename)
    {
        return realpath(__DIR__."/fixtures/$filename");
    }
}
