<?php
/**
*获取项目根目录地址
*
*/
function Mingpath(){
    $PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF, '/')+1);
    return $url;
}
function FilePATH(){
    define('FilePATH',str_replace('\\','/',realpath(dirname(__FILE__).'/../../'))."/");
    // if(defined('FilePATH')){
    // return true;
    // }else{
    // return false;
    // }
}