<?php

use Illuminate\Database\Seeder;

class UsersAndScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Score::class, 50)->create([
            'user_id' => function () {
                return factory(\App\Models\User::class)->create()->id;
            }
        ]);
    }
}
