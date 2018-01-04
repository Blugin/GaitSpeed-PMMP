<?php

namespace presentkim\gaitspeed\util;

/**
 * @param string $str
 * @param array  $strs
 *
 * @return bool
 */
function in_arrayi(string $str, array $strs) : bool{
    foreach ($strs as $key => $value) {
        if (strcasecmp($str, $value) === 0) {
            return true;
        }
    }
    return false;
}

/**
 * @param Object[] $list
 *
 * @return string[]
 */
function listToPairs(array $list) : array{
    $pairs = [];
    $size = sizeOf($list);
    for ($i = 0; $i < $size; ++$i) {
        $pairs["{%$i}"] = $list[$i];
    }
    return $pairs;
}

/**
 * @param string $extensionName
 * @param null   $extensionFileName
 */
function extensionLoad(string $extensionName, $extensionFileName = null) : void{
    if (!extension_loaded($extensionName)) {
        /** @noinspection PhpDeprecationInspection */
        dl($extensionFileName ?? (PHP_SHLIB_SUFFIX === 'dll' ? 'php_' : '') . "$extensionName." . PHP_SHLIB_SUFFIX);
    }
}