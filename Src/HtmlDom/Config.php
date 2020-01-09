<?php

namespace Dev4zx\HtmlDom;

class Config
{
    private static $config;
    private static $default_config = [
        'HDOM_TYPE_ELEMENT' => 1,
        'HDOM_TYPE_COMMENT' => 2,
        'HDOM_TYPE_TEXT' => 3,
        'HDOM_TYPE_ENDTAG' => 4,
        'HDOM_TYPE_ROOT' => 5,
        'HDOM_TYPE_UNKNOWN' => 6,
        'HDOM_QUOTE_DOUBLE' => 0,
        'HDOM_QUOTE_SINGLE' => 1,
        'HDOM_QUOTE_NO' => 3,
        'HDOM_INFO_BEGIN' => 0,
        'HDOM_INFO_END' => 1,
        'HDOM_INFO_QUOTE' => 2,
        'HDOM_INFO_SPACE' => 3,
        'HDOM_INFO_TEXT' => 4,
        'HDOM_INFO_INNER' => 5,
        'HDOM_INFO_OUTER' => 6,
        'HDOM_INFO_ENDSPACE' => 7,
        'DEFAULT_TARGET_CHARSET' => 'UTF-8',
        'DEFAULT_BR_TEXT' => "\r\n",
        'DEFAULT_SPAN_TEXT' =>  ' ',
        'MAX_FILE_SIZE' => 600000,
        'HDOM_SMARTY_AS_TEXT' => 1,
    ];

    public static function set($config = [])
    {
        self::$config = $config;
    }

    public static function get($name)
    {
        if (isset(self::$config[$name])) {
            $result = self::$config[$name];
        } elseif (isset(self::$default_config[$name])) {
            $result = self::$default_config[$name];
        }
        return isset($result) ? $result : null;
    }
}
