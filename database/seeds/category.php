<?php

use Illuminate\Database\Seeder;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'hotel',
            'description' => 'hotel',
            'img' => 'hotel.jpg',
        ]);

    }
}
