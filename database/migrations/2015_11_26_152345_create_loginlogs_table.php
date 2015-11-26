<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('loginlogs', function (Blueprint $table) {
			$table->increments('id');
			$table->Integer('user_id');
			$table->string('ip', 200);
			$table->string('ua', 200);
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('loginlogs');
    }
}
