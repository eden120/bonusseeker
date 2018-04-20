<?php

return [

    /*
     * API key generated on the "My Account" page.
     */
    'key'   => env('CLOUDFLARE_KEY', 'd8f2a7dda78954872ca2b03a98807e98ee2c6'),

    /*
     * Email address associated with your account.
     */
    'email' => env('CLOUDFLARE_EMAIL', 'andrewrmcdermott@gmail.com'),

    /*
     * Array of zones.
     *
     * Each zone must have its identifier as a key. The value is an
     * associated array with *optional* arrays of files and/or tags.
     * If nothing is provided, then everything will be purged.
     *
     * E.g.
     *
     * '023e105f4ecef8ad9ca31a8372d0c353' => [
     *      'files' => [
     *          'http://example.com/css/app.css',
     *      ],
     *      'tags' => [
     *          'styles',
     *          'scripts',
     *      ],
     * ],
     */
    'zones' => [
        'a001fa4cdd78820ee85caec1457d697a' => [],
    ],
];
