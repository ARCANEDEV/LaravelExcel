<?php namespace Arcanedev\LaravelExcel\Tests\Exporters;

use Arcanedev\LaravelExcel\Exporters\CsvExporter;
use Arcanedev\LaravelExcel\Importers\CsvImporter;
use Box\Spout\Common\Type;
use Illuminate\Support\Collection;

/**
 * Class     CsvExporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Exporters
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CsvExporterTest extends AbstractExporterTest
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelExcel\Exporters\CsvExporter */
    protected $exporter;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    protected function setUp()
    {
        parent::setUp();

        $this->exporter = new CsvExporter;
    }

    protected function tearDown()
    {
        unset($this->exporter);

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
            \Arcanedev\LaravelExcel\Contracts\Exporter::class,
            \Arcanedev\LaravelExcel\Exporters\AbstractExporter::class,
            CsvExporter::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->exporter);
        }

        static::assertSame(Type::CSV, $this->exporter->getType());
    }

    /** @test */
    public function it_can_save()
    {
        $expected = [
            ['csv--11', 'csv--12', 'csv--13'],
            ['csv--21', 'csv--22', 'csv--23'],
            ['csv--31', 'csv--32', 'csv--33'],
        ];
        $data = Collection::make()->transform(function ($row) {
            return new Collection($row);
        });

        $this->exporter->load($data);
        $this->exporter->save(
            $path = $this->getExportsFolder().'/csv/standard.csv'
        );

        $sheets = $this->getAllRowsFromFile('csv/standard.csv');

        static::assertSame($expected, $sheets->first()->toArray());
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    private function getAllRowsFromFile(
        $fileName,
        $fieldDelimiter = ',',
        $fieldEnclosure = '"',
        $endOfLineCharacter = "\n",
        $encoding = 'UTF-8',
        $shouldPreserveEmptyRows = false
    ) {
        $resourcePath = $this->getFixture($fileName);
        $reader       = new CsvImporter([
            'field-delimiter'     => $fieldDelimiter,
            'field-enclosure'     => $fieldEnclosure,
            'encoding'            => $encoding,
            'eol-character'       => $endOfLineCharacter,
            'preserve-empty-rows' => $shouldPreserveEmptyRows,
        ]);

        return $reader->load($resourcePath)->all();
    }
}
