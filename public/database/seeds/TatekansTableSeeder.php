<?php

use Illuminate\Database\Seeder;

class TatekansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Tatekan::class, 15)->create();
    }
}
