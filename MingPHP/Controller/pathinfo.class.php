<?php
namespace MingPHP\controller;
/**
*Pathinfo类根据访问所带参数进入指定方法下
*/
class pathinfo
{
	/**
	 * infoming 运行文件引入
	 */
	public static function infoming()
	{
//		拆分PATHINFO信息用
		$arr=array();
		// 没有PATHINFO 信息也不报错
		error_reporting(E_ALL & ~E_NOTICE);
//		去除第一个“/”;
		$path = substr($_SERVER['PATH_INFO'], 1);
//		$arr[0] 为类名  [1]为方法名
		$arr=explode("/",$path);
		if(empty($arr[0])){
			$arr[0]=index;
		}
		empty($arr[1])?$arr[1]="index":"null" ;
//		引入所访问的方法类
//		$str=FilePATH.APP_PATH."/contorller/".$arr['0'].".class.php";
//		通过PATHINFO获取类名与方法 并用命名空间实例化
		$str1="\\".APP_PATH."\\controller\\".$arr['0'];
		$function=new $str1();
		$function->$arr['1']();
//		将/改为controller
//		str = explode("/", $path);
//		$paths = sprintf("%s.class.php", $str);
//		return $paths;
	}
}