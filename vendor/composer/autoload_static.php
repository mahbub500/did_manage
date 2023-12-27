<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb6b66c873ea5793acdd366937a26e144
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Codexpert\\WpDid\\App\\' => 20,
            'Codexpert\\WpDid\\API\\' => 20,
            'Codexpert\\WpDid\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Codexpert\\WpDid\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Codexpert\\WpDid\\API\\' => 
        array (
            0 => __DIR__ . '/../..' . '/api',
        ),
        'Codexpert\\WpDid\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Codexpert\\Plugin\\Base' => __DIR__ . '/..' . '/mahbub/plugin/src/Base.php',
        'Codexpert\\Plugin\\Fields' => __DIR__ . '/..' . '/mahbub/plugin/src/Fields.php',
        'Codexpert\\Plugin\\Metabox' => __DIR__ . '/..' . '/mahbub/plugin/src/Metabox.php',
        'Codexpert\\Plugin\\Notice' => __DIR__ . '/..' . '/mahbub/plugin/src/Notice.php',
        'Codexpert\\Plugin\\Settings' => __DIR__ . '/..' . '/mahbub/plugin/src/Settings.php',
        'Codexpert\\Plugin\\Setup' => __DIR__ . '/..' . '/mahbub/plugin/src/Setup.php',
        'Codexpert\\Plugin\\Table' => __DIR__ . '/..' . '/mahbub/plugin/src/Table.php',
        'Codexpert\\Plugin\\Widget' => __DIR__ . '/..' . '/mahbub/plugin/src/Widget.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Pluggable\\Marketing\\Deactivator' => __DIR__ . '/..' . '/pluggable/marketing/src/Deactivator.php',
        'Pluggable\\Marketing\\Feature' => __DIR__ . '/..' . '/pluggable/marketing/src/Feature.php',
        'Pluggable\\Marketing\\Survey' => __DIR__ . '/..' . '/pluggable/marketing/src/Survey.php',
        'Pluggable\\Plugin\\License' => __DIR__ . '/..' . '/pluggable/plugin/src/License.php',
        'Pluggable\\Plugin\\Update' => __DIR__ . '/..' . '/pluggable/plugin/src/Update.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb6b66c873ea5793acdd366937a26e144::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb6b66c873ea5793acdd366937a26e144::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb6b66c873ea5793acdd366937a26e144::$classMap;

        }, null, ClassLoader::class);
    }
}
