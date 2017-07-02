<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert(
        	[
        	'name' => 'admin',
            'email'=> 'admin@gmail.com',
        	'password' => bcrypt('12345'),
        	'level'    => '1',
        	// 'create_at' => new DateTime(),
        	],
        	[
        	'name' => 'cuong',
            'email'=> 'cuong@gmail.com',
        	'password' => bcrypt('123456'),
        	'level'    => '1',
            // 'create_at' => new DateTime(),
        	],
        	[
        	'name' => 'long',
            'email'=> 'long@gmail.com',
        	'password' => bcrypt('12345'),
        	'level'    => '2',
            // 'create_at' => new DateTime(),
        	],
        	[
        	'name' => 'kien',
            'email'=> 'kien@gmail.com',
        	'password' => bcrypt('12345'),
        	'level'    => '2',
            // 'create_at' => new DateTime(),
        	],
        	[
        	'name' => 'admin',
            'email'=> 'admin@gmail.com',
        	'password' => bcrypt('12345'),
        	'level'    => '1',
            // 'create_at' => new DateTime(),
        	]
        	);
    }
}
