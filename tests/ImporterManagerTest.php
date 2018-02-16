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
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var \Arcanedev\LaravelExcel\Contracts\ImporterManager::class */
    protected $manager;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    protected function setUp()
    {
        parent::setUp();

        $this->manager = $this->app->make(\Arcanedev\LaravelExcel\Contracts\ImporterManager::class);
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
            \Arcanedev\LaravelExcel\Contracts\ImporterManager::class,
            \Arcanedev\LaravelExcel\ImporterManager::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->manager);
        }
    }

    /** @test */
    public function it_can_make_excel_exporter()
    {
        $importer = $this->manager->make('excel');

        static::assertInstanceOf(Importers\ExcelImporter::class, $importer);
        static::assertSame('xlsx', $importer->getType());
    }

    /** @test */
    public function it_can_make_csv_exporter()
    {
        $importer = $this->manager->make('csv');

        static::assertInstanceOf(Importers\CsvImporter::class, $importer);
        static::assertSame('csv', $importer->getType());
    }

    /** @test */
    public function it_can_make_open_office_exporter()
    {
        $importer = $this->manager->make('open-office');

        static::assertInstanceOf(Importers\OpenOfficeImporter::class, $importer);
        static::assertSame('ods', $importer->getType());
    }

    /** @test */
    public function it_can_make_default_exporter()
    {
        $importer = $this->manager->make(null);

        static::assertInstanceOf(Importers\ExcelImporter::class, $importer);
        static::assertSame('xlsx', $importer->getType());
    }
}
