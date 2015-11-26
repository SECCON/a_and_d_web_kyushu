<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('is_admin')->default(0);
			$table->string('password', 4);
			$table->string('name', 200);
			$table->string('kana', 200);
			$table->text('tel');
			$table->text('token')->nullable();
			$table->string('email', 200);
			$table->string('zip_code', 100);
			$table->text('address');
			$table->Timestamp("deleted_at")->nullable();
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
		Schema::drop('users');
    }
}
