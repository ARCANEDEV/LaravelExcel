<?php namespace Arcanedev\LaravelExcel\Importers;

use Illuminate\Database\Eloquent\Collection;
use Box\Spout\Reader\ReaderFactory;
use Arcanedev\LaravelExcel\Contracts\Parser as ParserContract;
use Arcanedev\LaravelExcel\Contracts\Importer as ImporterContract;

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
    protected $path;

    /** @var  string */
    protected $type;

    /** @var  \Arcanedev\LaravelExcel\Contracts\Parser */
    protected $parser;

    /** @var  int */
    protected $sheet;

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * AbstractImporter constructor.
     */
    public function __construct()
    {
        $this->setPath('');
        $this->setSheet(0);
        $this->setParser(new DefaultParser);
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
     * Get the parsed data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function get()
    {
        $reader = $this->create();
        $reader->open($this->path);
        $collection = $this->parseRows($reader);
        $reader->close();

        return $collection;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Create the reader instance.
     *
     * @return \Box\Spout\Reader\ReaderInterface
     */
    protected function create()
    {
        return ReaderFactory::create($this->type);
    }

    /**
     * Parse the rows.
     *
     * @param  \Box\Spout\Reader\ReaderInterface  $reader
     *
     * @return \Illuminate\Support\Collection
     */
    protected function parseRows($reader)
    {
        $collection = Collection::make();

        foreach ($reader->getSheetIterator() as $index => $sheet) {
            if ($index !== $this->sheet) continue;

            foreach ($sheet->getRowIterator() as $row) {
                $collection->push(
                    $this->parser->transform($row)
                );
            }
        }

        return $collection;
    }
}
