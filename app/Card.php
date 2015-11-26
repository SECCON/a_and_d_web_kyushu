<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
	use SoftDeletes;

	protected $table = 'cards';
	protected $dates = ['deleted_at'];

	protected $fillable = ['tag', 'user_id', 'path'];

	public function user()
	{
 		return $this->belongsTo('App\User', 'user_id');
	}

}
