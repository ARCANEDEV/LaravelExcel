<?php namespace Arcanedev\LaravelExcel\Importers;

use Arcanedev\LaravelExcel\Contracts\Importer as ImporterContract;
use Arcanedev\LaravelExcel\Contracts\Parser as ParserContract;
use Arcanedev\LaravelExcel\Traits\WithOptions;
use Box\Spout\Reader\ReaderFactory;
use Illuminate\Support\Collection;

/**
 * Class     AbstractExporter
 *
 * @package  Arcanedev\LaravelExcel\Importer
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @todo: Refactor the parse methods
 */
abstract class AbstractImporter implements ImporterContract
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

    /** @var  string */
    protected $type;

    /** @var  string */
    protected $path = '';

    /** @var  \Arcanedev\LaravelExcel\Contracts\Parser */
    protected $parser;

    /** @var \Box\Spout\Reader\ReaderInterface */
    protected $reader;

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
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

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
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

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
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
     * @param  int|string  $sheet
     *
     * @return \Illuminate\Support\Collection
     */
    public function get($sheet = 1)
    {
        $this->create();
        $this->reader->open($this->path);
        $collection = $this->parseRows($sheet);
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
        return $this->get('*');
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
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
     * @param  int|string  $sheetIndex
     *
     * @return \Illuminate\Support\Collection
     */
    protected function parseRows($sheetIndex)
    {
        $sheets = $this->newCollection();

        foreach ($this->reader->getSheetIterator() as $index => $sheet) {
            if ($sheetIndex === '*') {
                $rows = $this->newCollection();

                foreach ($sheet->getRowIterator() as $row) {
                    $rows->push($this->parser->transform($row));
                }

                $sheets->put($index, $rows);
            }
            elseif ($sheetIndex === $index) {
                foreach ($sheet->getRowIterator() as $row) {
                    $sheets->push($this->parser->transform($row));
                }
                break;
            }
        }

        return $sheets;
    }

    /**
     * Create a new collection object.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function newCollection()
    {
        return new Collection;
    }
}
