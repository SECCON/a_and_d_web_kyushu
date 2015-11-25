<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('topics', function (Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('is_public')->default(0);
			$table->string('title', 200);
			$table->text('body');
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
		Schema::drop('topics');
    }
}
