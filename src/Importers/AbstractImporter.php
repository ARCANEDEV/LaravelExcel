<?php namespace Arcanedev\LaravelExcel\Importers;

use Arcanedev\LaravelExcel\Contracts\Importer as ImporterContract;
use Arcanedev\LaravelExcel\Contracts\Parser as ParserContract;
use Box\Spout\Reader\ReaderFactory;
use Illuminate\Support\Collection;

/**
 * Class     AbstractExporter
 *
 * @package  Arcanedev\LaravelExcel\Importer
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractImporter implements ImporterContract
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  string */
    protected $type;

    /** @var  string */
    protected $path = '';

    /** @var  int */
    protected $sheet = 0;

    /** @var  \Arcanedev\LaravelExcel\Contracts\Parser */
    protected $parser;

    /** @var \Box\Spout\Reader\ReaderInterface */
    protected $reader;

    /** @var array */
    protected $options = [];

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * AbstractImporter constructor.
     *
     * @param  array  $options
     */
    public function __construct(array $options = [])
    {
        $this->setParser(new DefaultParser);
        $this->setOptions($options);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Set the path.
     *
     * @param  string  $path
     *
     * @return self
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Set the sheet number.
     *
     * @param  int  $sheet
     *
     * @return self
     */
    public function setSheet($sheet)
    {
        $this->sheet = $sheet;

        return $this;
    }

    /**
     * Set the parser.
     *
     * @param  \Arcanedev\LaravelExcel\Contracts\Parser  $parser
     *
     * @return self
     */
    public function setParser(ParserContract $parser)
    {
        $this->parser = $parser;

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
     * Set the reader options.
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

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Load the file.
     *
     * @param  string  $path
     *
     * @return self
     */
    public function load($path)
    {
        return $this->setPath($path);
    }

    /**
     * Get the parsed data for a single sheet.
     *
     * @param  int  $sheet
     *
     * @return \Illuminate\Support\Collection
     */
    public function get($sheet = 1)
    {
        $this->setSheet($sheet);
        $this->create();
        $this->reader->open($this->path);
        $collection = $this->parseRows();
        $this->reader->close();

        return $collection;
    }

    /**
     * Get the parsed data for all sheets.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        $this->create();
        $this->reader->open($this->path);
        $collection = $this->parseAllRows();
        $this->reader->close();

        return $collection;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Create the reader instance.
     */
    protected function create()
    {
        $this->reader = ReaderFactory::create($this->type);
        $this->loadOptions();
    }

    /**
     * Load the reader options.
     */
    abstract protected function loadOptions();

    /**
     * Parse the rows of selected sheet.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function parseRows()
    {
        $rows = Collection::make();

        foreach ($this->reader->getSheetIterator() as $index => $sheet) {
            if ($index !== $this->sheet) continue;

            foreach ($sheet->getRowIterator() as $row) {
                $rows->push($this->parser->transform($row));
            }
        }

        return $rows;
    }

    /**
     * Parse all the rows.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function parseAllRows()
    {
        $sheets = Collection::make();

        foreach ($this->reader->getSheetIterator() as $index => $sheet) {
            $rows = Collection::make();

            foreach ($sheet->getRowIterator() as $row) {
                $rows->push($this->parser->transform($row));
            }

            $sheets->put($index, $rows);
        }

        return $sheets;
    }
}
