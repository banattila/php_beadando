<?php

class CheckCookies {

    public static function checkCookiesEnabled(){
        setcookie("testcookie", "hello");
        if (!isset($_COOKIE['testcookie'])){
            if (isset($_GET['PHPSESSID'])){
                session_id($_GET['PHPSESSID']);
                $id = session_id();
                $suffix = "?PHPSESSID=" . $id;
                $GLOBALS['suffix'] = $suffix;
            } else {
                $GLOBALS['suffix'] = "";
            }
        }
        session_start();
    }
}