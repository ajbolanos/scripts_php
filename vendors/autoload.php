<?php
$vendorDir = __DIR__;
$baseDir   = dirname($vendorDir);

require_once $vendorDir . '/composer/ClassLoader.php';

$loader = new \Composer\Autoload\ClassLoader();
$loader->set('', array($baseDir . '/src'));
$loader->set('Eshu', array($vendorDir . '/eshu/src'));

$loader->register(true);
return $loader;
