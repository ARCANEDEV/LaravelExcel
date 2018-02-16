<?php namespace Arcanedev\LaravelExcel\Tests;

/**
 * Class     ExporterManagerTest
 *
 * @package  Arcanedev\LaravelExcel\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExporterManagerTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var \Arcanedev\LaravelExcel\Contracts\ExporterManager::class */
    protected $manager;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    protected function setUp()
    {
        parent::setUp();

        $this->manager = $this->app->make(\Arcanedev\LaravelExcel\Contracts\ExporterManager::class);
    }

    protected function tearDown()
    {
        unset($this->manager);

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
            \Illuminate\Support\Manager::class,
            \Arcanedev\LaravelExcel\Contracts\ExporterManager::class,
            \Arcanedev\LaravelExcel\ExporterManager::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->manager);
        }
    }

    /** @test */
    public function it_can_make_excel_exporter()
    {
        $exporter = $this->manager->make('excel');

        static::assertInstanceOf(\Arcanedev\LaravelExcel\Exporters\ExcelExporter::class, $exporter);
        static::assertSame('xlsx', $exporter->getType());
    }

    /** @test */
    public function it_can_make_csv_exporter()
    {
        $exporter = $this->manager->make('csv');

        static::assertInstanceOf(\Arcanedev\LaravelExcel\Exporters\CsvExporter::class, $exporter);
        static::assertSame('csv', $exporter->getType());
    }

    /** @test */
    public function it_can_make_open_office_exporter()
    {
        $exporter = $this->manager->make('open-office');

        static::assertInstanceOf(\Arcanedev\LaravelExcel\Exporters\OpenOfficeExporter::class, $exporter);
        static::assertSame('ods', $exporter->getType());
    }
}
