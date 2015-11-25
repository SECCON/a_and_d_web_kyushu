<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
	use SoftDeletes;

	protected $table = 'inquiries';
	protected $dates = ['deleted_at'];

	protected $fillable = ['is_done', 'name', 'email', 'title', 'body'];
}