<?php
if(version_compare(PHP_VERSION,'5.3.0','<')) die('require PHP > 5.3.0,无法使用命名空间');
//define('MING_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
//定义文件目录
define('APP_PATH','Home');
include 'MingPHP/MingPHP.php';