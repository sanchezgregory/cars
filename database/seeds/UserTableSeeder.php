<?php

use Cars\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        factory(User::class, 10)->create();

    }
}
