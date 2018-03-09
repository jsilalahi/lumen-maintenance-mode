<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Response
    |--------------------------------------------------------------------------
    |
    | This option controls the response of maintenance mode
    |
    | The available template is:
    | - %time% unix time showing the beginning of maintenance mode
    | - %message% human message of maintenance mode
    | - %retry% time in seconds to retry
    |
    */

    'response' => [
        'time' => '%time%',
        'message' => '%message%',
        'retry' => '%retry%'
    ],
];