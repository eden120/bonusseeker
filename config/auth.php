<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard'     => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'analyst' => [
            'driver'   => 'session',
            'provider' => 'analysts',
        ],

        'editor' => [
            'driver'   => 'session',
            'provider' => 'editors',
        ],

        'seo' => [
            'driver'   => 'session',
            'provider' => 'seos',
        ],

        'user' => [
            'driver'   => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver'   => 'session',
            'provider' => 'admins',
        ],

        'web' => [
            'driver'   => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver'   => 'token',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'analysts' => [
            'driver' => 'eloquent',
            'model'  => App\Analyst::class,
        ],

        'editors' => [
            'driver' => 'eloquent',
            'model'  => App\Editor::class,
        ],

        'seos' => [
            'driver' => 'eloquent',
            'model'  => App\Seo::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model'  => App\Admin::class,
        ],

        'users' => [
            'driver' => 'eloquent',
            'model'  => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'analysts' => [
            'provider' => 'analysts',
            'table'    => 'analyst_password_resets',
            'expire'   => 60,
        ],

        'editors' => [
            'provider' => 'editors',
            'table'    => 'editor_password_resets',
            'expire'   => 60,
        ],

        'seos' => [
            'provider' => 'seos',
            'table'    => 'seo_password_resets',
            'expire'   => 60,
        ],

        'users' => [
            'provider' => 'users',
            'table'    => 'user_password_resets',
            'expire'   => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table'    => 'admin_password_resets',
            'expire'   => 60,
        ],
    ],

];