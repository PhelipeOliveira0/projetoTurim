<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6646dd625b48219141f49d860aaef37c
{
    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'php\\projeto_turim\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'php\\projeto_turim\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6646dd625b48219141f49d860aaef37c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6646dd625b48219141f49d860aaef37c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6646dd625b48219141f49d860aaef37c::$classMap;

        }, null, ClassLoader::class);
    }
}
