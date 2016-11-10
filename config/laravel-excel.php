<?php

return [
    /* ------------------------------------------------------------------------------------------------
     |  Default driver
     | ------------------------------------------------------------------------------------------------
     */
    'default' => 'excel',

    /* ------------------------------------------------------------------------------------------------
     |  Drivers
     | ------------------------------------------------------------------------------------------------
     */
    'drivers' => [
        'excel' => [
            'options' => [
                'format-dates'        => false,
                'preserve-empty-rows' => false,
            ],
        ],

        'csv'   => [
            'options' => [
                'field-delimiter'     => ',',
                'field-enclosure'     => '"',
                'encoding'            => 'UTF-8',
                'eol-character'       => "\n",
                'preserve-empty-rows' => false,
            ],
        ],

        'ods'   => [
            'options' => [
                'format-dates'        => false,
                'preserve-empty-rows' => false,
            ],
        ],
    ],
];
