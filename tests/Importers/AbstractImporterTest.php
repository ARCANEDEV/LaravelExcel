<?php namespace Arcanedev\LaravelExcel\Tests\Importers;

use Arcanedev\LaravelExcel\Tests\TestCase;

/**
 * Class     AbstractImporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractImporterTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelExcel\Importers\AbstractImporter */
    protected $importer;

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_set_and_get_options()
    {
        static::assertEquals([], $this->importer->getOptions());

        $this->importer->setOption('option-1', 'value-1');

        static::assertEquals(['option-1' => 'value-1'], $this->importer->getOptions());

        $this->importer->setOptions([
            'option-1' => 'value-1-updated',
            'option-2' => 'value-2',
        ]);

        static::assertEquals(
            [
                'option-1' => 'value-1-updated',
                'option-2' => 'value-2',
            ],
            $this->importer->getOptions()
        );
    }

    /** @test */
    public function it_can_reset_options()
    {
        static::assertEquals([], $this->importer->getOptions());

        $this->importer->setOption('option-1', 'value-1');
        $this->importer->setOption('option-2', 'value-2');

        static::assertEquals(
            ['option-1' => 'value-1', 'option-2' => 'value-2'],
            $this->importer->getOptions()
        );

        $this->importer->resetOptions([
            'option-1' => 'value-1-updated',
            'option-2' => 'value-2-updated',
        ]);

        static::assertEquals(
            [
                'option-1' => 'value-1-updated',
                'option-2' => 'value-2-updated',
            ],
            $this->importer->getOptions()
        );
    }
}
