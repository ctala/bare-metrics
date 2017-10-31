<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit135668160f117097498cd6c25237fa32
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'ctala\\Baremetrics\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ctala\\Baremetrics\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'Curl' => 
            array (
                0 => __DIR__ . '/..' . '/curl/curl/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit135668160f117097498cd6c25237fa32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit135668160f117097498cd6c25237fa32::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit135668160f117097498cd6c25237fa32::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
