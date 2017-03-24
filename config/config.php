<?php

use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Glob;

$config = [];
// Load configuration from autoload path
foreach (Glob::glob(__DIR__.'/autoload/{{,*.}global,{,*.}local}.php', Glob::GLOB_BRACE) as $file) {
    $config = ArrayUtils::merge($config, include $file);
}

// Return an ArrayObject so we can inject the config as a service in Aura.Di
// and still use array checks like ``is_array``.
return new ArrayObject($config, ArrayObject::ARRAY_AS_PROPS);
