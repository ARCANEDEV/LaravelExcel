<?php namespace Arcanedev\LaravelExcel\Tests\Exporters;

use Arcanedev\LaravelExcel\Tests\TestCase;

/**
 * Class     AbstractExporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Exporters
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractExporterTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelExcel\Exporters\AbstractExporter */
    protected $exporter;

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_set_and_get_options()
    {
        static::assertEquals([], $this->exporter->getOptions());

        $this->exporter->setOption('option-1', 'value-1');

        static::assertEquals(['option-1' => 'value-1'], $this->exporter->getOptions());

        $this->exporter->setOptions([
            'option-1' => 'value-1-updated',
            'option-2' => 'value-2',
        ]);

        static::assertEquals(
            [
                'option-1' => 'value-1-updated',
                'option-2' => 'value-2',
            ],
            $this->exporter->getOptions()
        );
    }

    /** @test */
    public function it_can_reset_options()
    {
        static::assertEquals([], $this->exporter->getOptions());

        $this->exporter->setOption('option-1', 'value-1');
        $this->exporter->setOption('option-2', 'value-2');

        static::assertEquals(
            ['option-1' => 'value-1', 'option-2' => 'value-2'],
            $this->exporter->getOptions()
        );

        $this->exporter->resetOptions([
            'option-1' => 'value-1-updated',
            'option-2' => 'value-2-updated',
        ]);

        static::assertEquals(
            [
                'option-1' => 'value-1-updated',
                'option-2' => 'value-2-updated',
            ],
            $this->exporter->getOptions()
        );
    }
}
