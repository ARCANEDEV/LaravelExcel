<?php namespace Arcanedev\LaravelExcel\Exporters;

use Illuminate\Support\Collection;
use Box\Spout\Writer\WriterFactory;
use Arcanedev\LaravelExcel\Contracts\Serializer as SerializerContract;
use Arcanedev\LaravelExcel\Contracts\Exporter as ExporterContract;

/**
 * Class     AbstractExporter
 *
 * @package  Arcanedev\LaravelExcel\Exporter
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractExporter implements ExporterContract
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var array */
    protected $data = [];

    /** @var string */
    protected $type;

    /** @var \Arcanedev\LaravelExcel\Contracts\Serializer */
    protected $serializer;

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * AbstractExporter constructor.
     */
    public function __construct()
    {
        $this->setSerializer(new DefaultSerializer);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Set the serializer.
     *
     * @param  \Arcanedev\LaravelExcel\Contracts\Serializer  $serializer
     *
     * @return self
     */
    public function setSerializer(SerializerContract $serializer)
    {
        $this->serializer = $serializer;

        return $this;
    }

    /**
     * Get the file type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Load the data.
     *
     * @param  Collection  $data
     *
     * @return self
     */
    public function load(Collection $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Save the data to a file.
     *
     * @param  string  $filename
     */
    public function save($filename)
    {
        $writer = $this->create();
        $writer->openToFile($filename);
        $this->makeRows($writer);
        $writer->close();
    }

    /**
     * Output data directly to the browser.
     *
     * @param  string  $filename
     */
    public function stream($filename)
    {
        $writer = $this->create();
        $writer->openToBrowser($filename);
        $this->makeRows($writer);
        $writer->close();
    }

    /**
     * @return \Box\Spout\Writer\WriterInterface
     */
    protected function create()
    {
        return WriterFactory::create($this->type);
    }

    /**
     * @param  \Box\Spout\Writer\WriterInterface  $writer
     */
    protected function makeRows(&$writer)
    {
        if ( ! empty($headerRow = $this->serializer->getHeader()))
            $writer->addRow($headerRow);

        foreach ($this->data as $record) {
            $writer->addRow(
                $this->serializer->getData($record)
            );
        }
    }
}
