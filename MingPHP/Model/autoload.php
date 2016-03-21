<?php
/**
*自动加载class.php方法
*
*/
class autoload{
	public static function load($classname){
		// 将传过来的路径\改为反斜杠
		// $filename=str_replace('\\', '/', $classname);
		// sprintf 给路径尾部加上文件类型
		$filename=sprintf('%s.class.php',FilePATH.str_replace('\\', '/', $classname));
		if (is_file($filename)) {
//			引入命名空间指定文件
			require_once $filename;
		}
	}
}
// spl_autoload_register(['autoload','load']);
spl_autoload_register(array('autoload', 'load'));