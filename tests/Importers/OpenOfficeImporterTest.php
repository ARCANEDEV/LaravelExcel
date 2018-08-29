<?php namespace Arcanedev\LaravelExcel\Tests\Importers;

use Arcanedev\LaravelExcel\Importers\OpenOfficeImporter;
use Box\Spout\Common\Type;

/**
 * Class     OpenOfficeImporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OpenOfficeImporterTest extends AbstractImporterTest
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelExcel\Importers\OpenOfficeImporter */
    protected $importer;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    protected function setUp()
    {
        parent::setUp();

        $this->importer = new OpenOfficeImporter;
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
            OpenOfficeImporter::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->importer);
        }

        static::assertSame(Type::ODS, $this->importer->getType());
    }

    /** @test */
    public function it_can_load_file()
    {
        $this->importer
            ->load($this->getFixture('ods/one_sheet_with_strings.ods'))
            ->setSheet(1);

        $data = $this->importer->get();

        static::assertInstanceOf(\Illuminate\Support\Collection::class, $data);
        static::assertSame([
            ['ods--11', 'ods--12', 'ods--13'],
            ['ods--21', 'ods--22', 'ods--23'],
        ], $data->toArray());
    }
}
