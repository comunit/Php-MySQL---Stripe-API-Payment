<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a0fdef1d0791fb7e7a6fde1bf6f7022
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a0fdef1d0791fb7e7a6fde1bf6f7022::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a0fdef1d0791fb7e7a6fde1bf6f7022::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
