<?php namespace Arcanedev\LaravelExcel\Tests\Importers;

use Arcanedev\LaravelExcel\Importers\OpenOfficeImporter;
use Arcanedev\LaravelExcel\Tests\TestCase;
use Box\Spout\Common\Type;

/**
 * Class     OpenOfficeImporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OpenOfficeImporterTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  \Arcanedev\LaravelExcel\Importers\OpenOfficeImporter */
    protected $importer;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->importer = new OpenOfficeImporter;
    }

    public function tearDown()
    {
        unset($this->importer);

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
            \Arcanedev\LaravelExcel\Contracts\Importer::class,
            \Arcanedev\LaravelExcel\Importers\AbstractImporter::class,
            OpenOfficeImporter::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->importer);
        }

        $this->assertSame(Type::ODS, $this->importer->getType());
    }

    /** @test */
    public function it_can_load_file()
    {
        $this->importer
            ->load($this->getFixture('ods/one_sheet_with_strings.ods'))
            ->setSheet(1);

        $data = $this->importer->get();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $data);
        $this->assertSame([
            ['ods--11', 'ods--12', 'ods--13'],
            ['ods--21', 'ods--22', 'ods--23'],
        ], $data->toArray());
    }
}
