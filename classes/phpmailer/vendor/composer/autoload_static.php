<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdeb2d88d15c7f4c3bbd9073a3e1d7d4e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdeb2d88d15c7f4c3bbd9073a3e1d7d4e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdeb2d88d15c7f4c3bbd9073a3e1d7d4e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdeb2d88d15c7f4c3bbd9073a3e1d7d4e::$classMap;

        }, null, ClassLoader::class);
    }
}
