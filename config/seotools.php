<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'       => FALSE, // set false to total remove
            'description' => FALSE, // set false to total remove
            'separator'   => ' - ',
            'keywords'    => [],
            'canonical'   => NULL, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => NULL,
            'bing'      => NULL,
            'alexa'     => NULL,
            'pinterest' => NULL,
            'yandex'    => NULL,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => FALSE, // set false to total remove
            'description' => FALSE, // set false to total remove
            'url'         => FALSE, // Set null for using Url::current(), set false to total remove
            'type'        => FALSE,
            'site_name'   => FALSE,
            'images'      => [],
        ],
    ],
    'twitter'   => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'summary',
            'site' => '@bonusseeker',
        ],
    ],
];