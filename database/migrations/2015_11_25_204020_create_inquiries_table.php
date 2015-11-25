<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('inquiries', function (Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('is_done')->default(0);
			$table->string('name', 200);
			$table->string('email', 200);
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
		Schema::drop('inquiries');
    }
}
