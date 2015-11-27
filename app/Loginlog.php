<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loginlog extends Model
{
	protected $table = 'loginlogs';

	protected $fillable = ['ua', 'user_id', 'ip'];

	public static function setLoginLog($id)
	{
		$date = date("Y/m/d H:i:s");
		$ua = \Request::server('HTTP_USER_AGENT');
		$ip = \Request::getClientIp();
		\DB::statement("INSERT INTO `loginlogs` (`ua`, `user_id`, `ip`, `created_at`, `updated_at`) VALUES ('{$ua}', {$id}, '{$ip}', '{$date}', '{$date}');");
	}
}
