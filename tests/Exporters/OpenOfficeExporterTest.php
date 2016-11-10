<?php namespace Arcanedev\LaravelExcel\Tests\Exporters;

use Arcanedev\LaravelExcel\Exporters\OpenOfficeExporter;
use Arcanedev\LaravelExcel\Tests\TestCase;
use Box\Spout\Common\Type;

/**
 * Class     OpenOfficeExporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Exporters
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OpenOfficeExporterTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  \Arcanedev\LaravelExcel\Exporters\OpenOfficeExporter */
    protected $exporter;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->exporter = new OpenOfficeExporter;
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
            OpenOfficeExporter::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->exporter);
        }

        $this->assertSame(Type::ODS, $this->exporter->getType());
    }
}
