<?php
define('MING',1);
//公共方法
require_once "Common/function.php";
//定义根目录URL地址
define('MingPATH',Mingpath());
//定义根目录文件地址
FilePATH();
//命名空间自动加载类
require_once 'Model/autoload.php';
//数据库操作类
require_once 'Model/mysqlmodel.class.php';
new mysqlmodel();
//pathinfo 模式获取访问路径
//$paths=Home\controller\index::index();
$path=MingPHP\controller\pathinfo::infoming();
?>