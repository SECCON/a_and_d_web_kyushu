<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
	use SoftDeletes;

	protected $table = 'topics';
	protected $dates = ['deleted_at'];

	protected $fillable = ['is_public', 'title', 'body'];
}
