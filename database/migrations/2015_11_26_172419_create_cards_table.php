<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('cards', function (Blueprint $table) {
			$table->increments('id');
			$table->Integer('user_id');
			$table->string('url', 200);
			$table->string('tag', 200);
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
		Schema::drop('cards');
    }
}
