<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

		DB::table('topics')->truncate();

		DB::table('topics')->insert([
			[
				'title'      => 'ようこそ！',
				'body'       => 'ページを公開しました！',
				'is_public'	 => 1,
				'deleted_at' => null,
				'created_at' => date("Y-m-d H:i:s", time()),
				'updated_at' => date("Y-m-d H:i:s", time()),
			]
		]);

		DB::table('users')->insert([
			[
				'name'		=>'admin',
				'email'		=>'admin@example.com',
				'password'	=>'1234',
				'is_admin'	=> 1,
				'kana'		=>'アドミン',
				'address'	=>'-',
				'tel'		=>'-',
				'deleted_at' => null,
				'created_at' => date("Y-m-d H:i:s", time()),
				'updated_at' => date("Y-m-d H:i:s", time()),
			]
		]);



		Model::reguard();
    }
}
