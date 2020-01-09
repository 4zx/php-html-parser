<?php

function file_get_html(
    $url,
    $use_include_path = false,
    $context = null,
    $offset = 0,
    $maxLen = -1,
    $lowercase = true,
    $forceTagsClosed = true,
    $target_charset = null,
    $stripRN = true,
    $defaultBRText = null,
    $defaultSpanText = null
) {
    $target_charset = $target_charset ?: Dev4zx\HtmlDom\Config::get('DEFAULT_TARGET_CHARSET');
    $defaultBRText = $defaultBRText ?: Dev4zx\HtmlDom\Config::get('DEFAULT_BR_TEXT');
    $defaultSpanText = $defaultSpanText ?: Dev4zx\HtmlDom\Config::get('DEFAULT_SPAN_TEXT');
    if ($maxLen <= 0) {
        $maxLen = Dev4zx\HtmlDom\Config::get('MAX_FILE_SIZE');
    }

    $dom = new Dev4zx\HtmlDom\Parser(
        null,
        $lowercase,
        $forceTagsClosed,
        $target_charset,
        $stripRN,
        $defaultBRText,
        $defaultSpanText
    );

    /**
     * For sourceforge users: uncomment the next line and comment the
     * retrieve_url_contents line 2 lines down if it is not already done.
     */
    $contents = file_get_contents(
        $url,
        $use_include_path,
        $context,
        $offset,
        $maxLen
    );
    // $contents = retrieve_url_contents($url);

    if (empty($contents) || strlen($contents) > $maxLen) {
        $dom->clear();
        return false;
    }

    return $dom->load($contents, $lowercase, $stripRN);
}

function str_get_html(
    $str,
    $lowercase = true,
    $forceTagsClosed = true,
    $target_charset = null,
    $stripRN = true,
    $defaultBRText = null,
    $defaultSpanText = null
) {
    $target_charset = $target_charset ?: Dev4zx\HtmlDom\Config::get('DEFAULT_TARGET_CHARSET');
    $defaultBRText = $defaultBRText ?: Dev4zx\HtmlDom\Config::get('DEFAULT_BR_TEXT');
    $defaultSpanText = $defaultSpanText ?: Dev4zx\HtmlDom\Config::get('DEFAULT_SPAN_TEXT');
    $dom = new Dev4zx\HtmlDom\Parser(
        null,
        $lowercase,
        $forceTagsClosed,
        $target_charset,
        $stripRN,
        $defaultBRText,
        $defaultSpanText
    );

    if (empty($str) || strlen($str) > Dev4zx\HtmlDom\Config::get('MAX_FILE_SIZE')) {
        $dom->clear();
        return false;
    }

    return $dom->load($str, $lowercase, $stripRN);
}

function dump_html_tree($node, $show_attr = true, $deep = 0)
{
    $node->dump($node);
}
