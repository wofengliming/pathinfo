<?php
class indexa{
	public static function index(){
		$API="http://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel=15939122392";
		$arr=file_get_contents($API);
		$str=iconv("gb2312", "utf-8//IGNORE",$arr);
		$strs=self::formadata($str);
		$strs['saf']=array('gdrwg'=>'asef','sdg'=>'g433');
		$aaa=self::xmlapp(200,'1112',$strs);
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
		echo $xml;
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
indexa::index();
