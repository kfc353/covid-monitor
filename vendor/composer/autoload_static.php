<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit85c86767762b75f0b3c5344aabb7623e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyCLabs\\Enum\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyCLabs\\Enum\\' => 
        array (
            0 => __DIR__ . '/..' . '/myclabs/php-enum/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit85c86767762b75f0b3c5344aabb7623e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit85c86767762b75f0b3c5344aabb7623e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit85c86767762b75f0b3c5344aabb7623e::$classMap;

        }, null, ClassLoader::class);
    }
}
