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
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var array */
    protected $data = [];

    /** @var string */
    protected $type;

    /** @var \Arcanedev\LaravelExcel\Contracts\Serializer */
    protected $serializer;

    /** @var \Box\Spout\Writer\WriterInterface */
    protected $writer;

    /** @var array */
    protected $options = [];

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * AbstractExporter constructor.
     *
     * @param  array  $options
     */
    public function __construct(array $options = [])
    {
        $this->setSerializer(new DefaultSerializer);
        $this->setOptions($options);
    }

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
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

    /**
     * Set the writer options.
     *
     * @param  array  $options
     *
     * @return self
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Load the data.
     *
     * @param  \Illuminate\Support\Collection  $data
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
        $this->create();
        $this->writer->openToFile($filename);
        $this->makeRows();
        $this->close();
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Create the writer.
     */
    protected function create()
    {
        $this->writer = WriterFactory::create($this->type);
        $this->loadOptions();
    }

    /**
     * Load the writer options.
     */
    abstract protected function loadOptions();

    /**
     * Close the writer.
     */
    protected function close()
    {
        $this->writer->close();
    }

    /**
     * Make rows.
     */
    protected function makeRows()
    {
        if ( ! empty($headerRow = $this->serializer->getHeader()))
            $this->writer->addRow($headerRow);

        foreach ($this->data as $record) {
            $this->writer->addRow(
                $this->serializer->getData($record)
            );
        }
    }
}
