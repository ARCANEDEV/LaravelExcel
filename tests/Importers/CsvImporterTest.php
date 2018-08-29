<?php namespace Arcanedev\LaravelExcel\Tests\Importers;

use Arcanedev\LaravelExcel\Importers\CsvImporter;
use Box\Spout\Common\Type;

/**
 * Class     CsvImporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CsvImporterTest extends AbstractImporterTest
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelExcel\Importers\CsvImporter */
    protected $importer;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    protected function setUp()
    {
        parent::setUp();

        $this->importer = new CsvImporter;
    }

    protected function tearDown()
    {
        unset($this->importer);

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
            \Arcanedev\LaravelExcel\Contracts\Importer::class,
            \Arcanedev\LaravelExcel\Importers\AbstractImporter::class,
            CsvImporter::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->importer);
        }

        static::assertSame(Type::CSV, $this->importer->getType());
    }

    /** @test */
    public function it_can_load_file()
    {
        $this->importer
            ->load($this->getFixture('csv/standard.csv'));

        $data = $this->importer->get();

        static::assertInstanceOf(\Illuminate\Support\Collection::class, $data);
        static::assertSame([
            ['csv--11', 'csv--12', 'csv--13'],
            ['csv--21', 'csv--22', 'csv--23'],
            ['csv--31', 'csv--32', 'csv--33'],
        ], $data->toArray());
    }
}
