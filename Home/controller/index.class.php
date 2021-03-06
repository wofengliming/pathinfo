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
		// var_dump($strs);
		// $res=json_encode($strs);
		// var_dump($strs);
		$strs['aa']=array('id'=>1,'33'=>'efe','aef2'=>array('aew'=>'qew','a2'=>'ae',),);
		$arr=self::xmlapp(200,'成功',$strs);
		echo $arr;
		// 调用redis
		// Imredis::getredis()->set('name','helwos');
		// $name=Imredis::getredis()->get('name');
		// var_dump($name);

	}
	/*将数据按照指定格式返回
	*integer code 状态码
	*string  提示信息 message
	*integer 数据 $data
	*/
	public static function jsonapp($code,$message='',$data=array()){
		if(!is_numeric($code)){
			return '';
		}
		$result=array(
				'code'=>$code,
				'message'=>$message,
				'data'=>$data
			);
		return json_encode($result);
	}
	public function xmlapp($code,$message='',$data){
		if(!is_numeric($code)) {
			return '';
		}

		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);

		header('Content-Type:text/xml');
		$xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$xml .= "<root>";
		$xml .= self::xmlapp2($result);
		$xml .= "</root>";
		return $xml;
	}
	/*
	*将数组按照XML格式返回
	*数据 $data
	*/
	public static function xmlapp2($data){
		// $attr 为了防止KEY为数字而定义
		$xml = $attr = '';
		foreach($data as $key => $value) {
			if(is_numeric($key)) {
				$attr = " id='" . $key . "'";
				$key = "item";
			}
			$xml .= "<{$key}{$attr}>";
			$xml .= is_array($value) ? self::xmlapp2($value) : $value;
			$xml .= "</{$key}>\n";
		}
		return $xml;
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