<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit431a3bc13a2c4e5ac126f88511f54152
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
        'S' => 
        array (
            'ShinePHP\\' => 9,
        ),
        'B' => 
        array (
            'BaseApi\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
        'ShinePHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/adammcgurk/shine-php/src/ShinePHP',
        ),
        'BaseApi\\' => 
        array (
            0 => __DIR__ . '/..' . '/adammcgurk/base-api/src/BaseApi',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit431a3bc13a2c4e5ac126f88511f54152::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit431a3bc13a2c4e5ac126f88511f54152::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
