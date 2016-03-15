<?php
namespace Home\controller;
use MingPHP\Model\Imredis;
class index{
	public static function index(){
		$API="http://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel=15939122392";
		$arr=file_get_contents($API);
		// var_dump($arr);
		$str=iconv("gb2312", "utf-8//IGNORE",$arr);
		// API返回的JSON数据
		// var_dump($str);
		$strs=self::formadata($str);
		// JSON转换数组
		var_dump($strs);
		// 调用redis
		Imredis::getredis()->set('name','helwos');
		$name=Imredis::getredis()->get('name');
		var_dump($name);

	}
	public static function formadata($data =null){
	    $res =false;
	    if($data){
	    preg_match_all("/(\w+):'([^']+)/",$data,$res);
	    //查看转换后的数组
	    // var_dump($res);
	    //合并数组第一个为Key第二个为值
	    $ress=array_combine($res[1],$res[2]);
	    }
		return $ress;
	}
}