<?php

/**
 * 每次都print_r或者var_dump调试信息是愚蠢的,不如试试这个函数,
 * 同时自动判断PHP的运行环境,非命令行下会格式化调试信息的展示.
 * @param mixed $data 要打印的信息
 * @param bool $dump 控制是否打印详细信息
 */
function debug($data,$dump = false)
{
    if ('cli' != PHP_SAPI)
        echo '<pre>';
    if ($dump)
        var_dump($data);
    else
        print_r($data);
    return;
}
