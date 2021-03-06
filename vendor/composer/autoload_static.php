<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5be92abfb4610c4151f3832ea0d0a8ed
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Frame\\' => 6,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Frame\\' => 
        array (
            0 => __DIR__ . '/../..' . '/frame',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5be92abfb4610c4151f3832ea0d0a8ed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5be92abfb4610c4151f3832ea0d0a8ed::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit5be92abfb4610c4151f3832ea0d0a8ed::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit5be92abfb4610c4151f3832ea0d0a8ed::$classMap;

        }, null, ClassLoader::class);
    }
}
