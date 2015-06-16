<?php

define("DB_HOST", "localhost"); // set database host
define("DB_USER", "root"); // set database user
define("DB_PASS", "123"); // set database password
define("DB_NAME", "water_bill"); // set database name

$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
mysql_set_charset('utf8', $link);
$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");
$user_registration = 1;  // set 0 or 1

define("COOKIE_TIME_OUT", 1); //specify cookie timeout in days (default is 10 days)
define('SALT_LENGTH', 9); // salt for password
//define ("ADMIN_NAME", "admin"); // sp
/* Specify user levels */
define("SUPER_ADMIN_LEVEL", 1);
define("ADMIN_LEVEL", 2);
define("LOCAL_USER_LEVEL", 3);

function EncodeURL($url) {
    $new = strtolower(ereg_replace(' ', '_', $url));
    return($new);
}

function DecodeURL($url) {
    $new = ucwords(ereg_replace('_', ' ', $url));
    return($new);
}

function ChopStr($str, $len) {
    if (strlen($str) < $len)
        return $str;

    $str = substr($str, 0, $len);
    if ($spc_pos = strrpos($str, " "))
        $str = substr($str, 0, $spc_pos);

    return $str . "...";
}

function isEmail($email) {
    return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
}

function isUserID($username) {
    if (preg_match('/^[a-z\d_]{5,20}$/i', $username)) {
        return true;
    } else {
        return false;
    }
}

function isURL($url) {
    if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) {
        return true;
    } else {
        return false;
    }
}

function checkPwd($x, $y) {
    if (empty($x) || empty($y)) {
        return false;
    }
    if (strlen($x) < 4 || strlen($y) < 4) {
        return false;
    }

    if (strcmp($x, $y) != 0) {
        return false;
    }
    return true;
}

?>