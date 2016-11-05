<?php namespace Arcanedev\LaravelExcel\Tests;

/**
 * Class     ExporterManagerTest
 *
 * @package  Arcanedev\LaravelExcel\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExporterManagerTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var \Arcanedev\LaravelExcel\Contracts\ExporterManager::class */
    protected $manager;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->manager = $this->app->make(\Arcanedev\LaravelExcel\Contracts\ExporterManager::class);
    }

    public function tearDown()
    {
        unset($this->manager);

        parent::tearDown();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Arcanedev\Support\Manager::class,
            \Arcanedev\LaravelExcel\Contracts\ExporterManager::class,
            \Arcanedev\LaravelExcel\ExporterManager::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->manager);
        }
    }

    /** @test */
    public function it_can_make_excel_exporter()
    {
        $exporter = $this->manager->make('excel');

        $this->assertInstanceOf(\Arcanedev\LaravelExcel\Exporters\ExcelExporter::class, $exporter);
        $this->assertSame('xlsx', $exporter->getType());
    }

    /** @test */
    public function it_can_make_csv_exporter()
    {
        $exporter = $this->manager->make('csv');

        $this->assertInstanceOf(\Arcanedev\LaravelExcel\Exporters\CsvExporter::class, $exporter);
        $this->assertSame('csv', $exporter->getType());
    }

    /** @test */
    public function it_can_make_open_office_exporter()
    {
        $exporter = $this->manager->make('open-office');

        $this->assertInstanceOf(\Arcanedev\LaravelExcel\Exporters\OpenOfficeExporter::class, $exporter);
        $this->assertSame('ods', $exporter->getType());
    }
}
