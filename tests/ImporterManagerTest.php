<?php namespace Arcanedev\LaravelExcel\Tests;

use Arcanedev\LaravelExcel\Importers;

/**
 * Class     ImporterManagerTest
 *
 * @package  Arcanedev\LaravelExcel\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ImporterManagerTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var \Arcanedev\LaravelExcel\Contracts\ImporterManager::class */
    protected $manager;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->manager = $this->app->make(\Arcanedev\LaravelExcel\Contracts\ImporterManager::class);
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
            \Arcanedev\LaravelExcel\Contracts\ImporterManager::class,
            \Arcanedev\LaravelExcel\ImporterManager::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->manager);
        }
    }

    /** @test */
    public function it_can_make_excel_exporter()
    {
        $importer = $this->manager->make('excel');

        $this->assertInstanceOf(Importers\ExcelImporter::class, $importer);
        $this->assertSame('xlsx', $importer->getType());
    }

    /** @test */
    public function it_can_make_csv_exporter()
    {
        $importer = $this->manager->make('csv');

        $this->assertInstanceOf(Importers\CsvImporter::class, $importer);
        $this->assertSame('csv', $importer->getType());
    }

    /** @test */
    public function it_can_make_open_office_exporter()
    {
        $importer = $this->manager->make('open-office');

        $this->assertInstanceOf(Importers\OpenOfficeImporter::class, $importer);
        $this->assertSame('ods', $importer->getType());
    }

    /** @test */
    public function it_can_make_default_exporter()
    {
        $importer = $this->manager->make(null);

        $this->assertInstanceOf(Importers\ExcelImporter::class, $importer);
        $this->assertSame('xlsx', $importer->getType());
    }
}
