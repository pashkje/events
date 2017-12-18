<?php

session_set_cookie_params(99999999);
session_start();
session_register('user_refer');


error_reporting(0);


function mellistransform(&$name)
{
    $name = trim(html_entity_decode(_mellisUTF8WIN1251($name), ENT_NOQUOTES, 'windows-1251'));
}

function _mellisUTF8WIN1251($s)
{
    $out = "";
    $c1 = "";
    $byte2 = false;
    for ($c = 0; $c < strlen($s); $c++) {
        $i = ord($s[$c]);
        if ($i <= 127) $out .= $s[$c];
        if ($byte2) {
            $new_c2 = ($c1 & 3) * 64 + ($i & 63);
            $new_c1 = ($c1 >> 2) & 5;
            $new_i = $new_c1 * 256 + $new_c2;
            if ($new_i == 1025) $out_i = 168; else
                if ($new_i == 1105) $out_i = 184; else $out_i = $new_i - 848;
            $out .= chr($out_i);
            $byte2 = false;
        }
        if (($i >> 5) == 6) {
            $c1 = $i;
            $byte2 = true;
        }
    }
    return $out;
}


$refer = UrlDecode($_SERVER['HTTP_REFERER']);
mellistransform($refer);
$refer = addslashes($refer);
if (!$refer) $refer = 'unknown';

if (!function_exists('detect_se')) {

    function detect_se($refer)
    {

        $engines = array(
            'yandex',
            'rambler',
            'aport.ru',
            'google',
            'yahoo.com',
            'nigma.ru',
            'ya.ru',
            'bing.com',
            'go.mail.ru',
            'r0.ru'
        );

        $refer = substr(trim(strtolower($refer)), 0, 80);
        reset($engines);
        foreach ($engines as $engine) {
            if (false !== strpos($refer, $engine)) return true;
        }
        return false;
    }

}

if (!$_SESSION['user_refer']) {
    $_SESSION['user_refer'] = $refer;
}

if (detect_se($_SERVER['HTTP_REFERER']) || detect_se($_SESSION['user_refer'])) {

    if (false !== strpos($refer, 'market.yandex.ru')) {
        define('USERSRC', 'YANDEX_MARKET');
    } elseif (false !== strpos($refer, 'direct.yandex.ru')) {
        define('USERSRC', 'YANDEX_DIRECT');
    } elseif (false !== strpos($_SERVER['HTTP_REFERER'], 'market.yandex.ru')) {
        define('USERSRC', 'YANDEX_MARKET');
    } elseif (false !== strpos($_SERVER['HTTP_REFERER'], 'direct.yandex.ru')) {
        define('USERSRC', 'YANDEX_DIRECT');
    } else {
        define('USERSRC', 'SEO');
    }

} else {
    define('USERSRC', 'OTHER');
}

if (detect_se($_SERVER['HTTP_REFERER']) && !detect_se($_SESSION['user_refer'])) {
    $_SESSION['old_refer'] = $_SESSION['user_refer'];
    $_SESSION['user_refer'] = $_SERVER['HTTP_REFERER'];
}


?>