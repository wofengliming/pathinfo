<?php
namespace MingPHP\Model;
/**
*获取Redis数据库句柄
*
*/
class Imredis
{
	private static $redis;
	public static function getRedis(){
		// 判断self::$redis 是否是 \Redis的对象
		if(!(self::$redis instanceof \Redis)){
			self::$redis = new \Redis();
			self::$redis->connect('127.0.0.1',6379);
		}
		return self::$redis;
	}
}