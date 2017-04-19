<?php namespace Arcanedev\LaravelExcel\Tests\Exporters;

use Arcanedev\LaravelExcel\Exporters\ExcelExporter;
use Arcanedev\LaravelExcel\Importers\ExcelImporter;
use Arcanedev\LaravelExcel\Tests\TestCase;
use Box\Spout\Common\Type;

/**
 * Class     ExcelExporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Exporters
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExcelExporterTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelExcel\Exporters\ExcelExporter */
    protected $exporter;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp()
    {
        parent::setUp();

        $this->exporter = new ExcelExporter;
    }

    public function tearDown()
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
            ExcelExporter::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->exporter);
        }

        $this->assertSame(Type::XLSX, $this->exporter->getType());
    }

    /** @test */
    public function it_can_save()
    {
        $expected = [
            ['s1 - A1', 's1 - B1', 's1 - C1', 's1 - D1', 's1 - E1'],
            ['s1 - A2', 's1 - B2', 's1 - C2', 's1 - D2', 's1 - E2'],
            ['s1 - A3', 's1 - B3', 's1 - C3', 's1 - D3', 's1 - E3'],
            ['s1 - A4', 's1 - B4', 's1 - C4', 's1 - D4', 's1 - E4'],
            ['s1 - A5', 's1 - B5', 's1 - C5', 's1 - D5', 's1 - E5'],
        ];

        $data = collect($expected)->transform(function ($row) {
            return collect($row);
        });

        $this->exporter->load($data);
        $this->exporter->save(
            $path = $this->getExportsFolder() . '/xlsx/one_sheet_with_inline_strings.xlsx'
        );

        $sheets = $this->getAllRowsFromFile('xlsx/one_sheet_with_inline_strings.xlsx');

        $this->assertSame($expected, $sheets->first()->toArray());
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    protected function getAllRowsFromFile(
        $fileName,
        $shouldFormatDates = false,
        $shouldPreserveEmptyRows = false
    ) {
        $resourcePath = $this->getFixture($fileName);

        $importer = new ExcelImporter([
            'format-dates'        => $shouldFormatDates,
            'preserve-empty-rows' => $shouldPreserveEmptyRows,
        ]);

        return $importer->load($resourcePath)->all();
    }
}
