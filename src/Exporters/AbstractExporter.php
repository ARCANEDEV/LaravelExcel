<?php namespace Arcanedev\LaravelExcel\Exporters;

use Arcanedev\LaravelExcel\Contracts\Exporter as ExporterContract;
use Arcanedev\LaravelExcel\Contracts\Serializer as SerializerContract;
use Arcanedev\LaravelExcel\Traits\WithOptions;
use Box\Spout\Writer\WriterFactory;
use Illuminate\Support\Collection;

/**
 * Class     AbstractExporter
 *
 * @package  Arcanedev\LaravelExcel\Exporter
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractExporter implements ExporterContract
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use WithOptions;

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
