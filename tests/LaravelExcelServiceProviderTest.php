<?php namespace Arcanedev\LaravelExcel\Tests;

use Arcanedev\LaravelExcel\LaravelExcelServiceProvider;

/**
 * Class     LaravelExcelServiceProviderTest
 *
 * @package  Arcanedev\LaravelExcel\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LaravelExcelServiceProviderTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelExcel\LaravelExcelServiceProvider */
    protected $provider;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    protected function setUp()
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(LaravelExcelServiceProvider::class);
    }

    protected function tearDown()
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Arcanedev\Support\ServiceProvider::class,
            \Arcanedev\Support\PackageServiceProvider::class,
            \Arcanedev\LaravelExcel\LaravelExcelServiceProvider::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->provider);
        }
    }

    /** @test */
    public function it_can_provides()
    {
        $expected = [
            \Arcanedev\LaravelExcel\Contracts\ExporterManager::class,
            \Arcanedev\LaravelExcel\Contracts\ImporterManager::class,
        ];

        static::assertSame($expected, $this->provider->provides());
    }
}
