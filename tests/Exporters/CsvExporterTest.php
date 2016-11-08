<?php namespace Arcanedev\LaravelExcel\Tests\Exporters;

use Arcanedev\LaravelExcel\Exporters\CsvExporter;
use Arcanedev\LaravelExcel\Tests\TestCase;
use Box\Spout\Common\Type;

/**
 * Class     CsvExporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Exporters
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CsvExporterTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  \Arcanedev\LaravelExcel\Exporters\CsvExporter */
    protected $exporter;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->exporter = new CsvExporter;
    }

    public function tearDown()
    {
        unset($this->exporter);

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
            \Arcanedev\LaravelExcel\Contracts\Exporter::class,
            \Arcanedev\LaravelExcel\Exporters\AbstractExporter::class,
            CsvExporter::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->exporter);
        }

        $this->assertSame(Type::CSV, $this->exporter->getType());
    }
}
