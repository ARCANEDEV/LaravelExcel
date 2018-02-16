<?php

return [

    /* -----------------------------------------------------------------
     |  Default driver
     | -----------------------------------------------------------------
     */

    'default' => 'excel',

    /* -----------------------------------------------------------------
     |  Drivers
     | -----------------------------------------------------------------
     */

    'drivers' => [
        'excel' => [
            'importer' => Arcanedev\LaravelExcel\Importers\ExcelImporter::class,
            'exporter' => Arcanedev\LaravelExcel\Exporters\ExcelExporter::class,
            'options'  => [
                'format-dates'        => false,
                'preserve-empty-rows' => false,
            ],
        ],

        'csv'   => [
            'importer' => Arcanedev\LaravelExcel\Importers\CsvImporter::class,
            'exporter' => Arcanedev\LaravelExcel\Exporters\CsvExporter::class,
            'options'  => [
                'field-delimiter'     => ',',
                'field-enclosure'     => '"',
                'encoding'            => 'UTF-8',
                'eol-character'       => "\n",
                'preserve-empty-rows' => false,
            ],
        ],

        'ods'   => [
            'importer' => Arcanedev\LaravelExcel\Importers\OpenOfficeImporter::class,
            'exporter' => Arcanedev\LaravelExcel\Exporters\OpenOfficeExporter::class,
            'options'  => [
                'format-dates'        => false,
                'preserve-empty-rows' => false,
            ],
        ],
    ],

];
