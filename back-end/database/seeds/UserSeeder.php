<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'name',
            'email' => 'email@email.com',
            'password' => '$2y$10$m2ZBZrQcjVZiqWOfSSSasOAYqy7bxFnQKlY8uLQP94tRZ5mXOaec6', // password
        ]);

        factory(App\User::class, 10)->create();
    }
}
