<?php

namespace Database\Seeders;

use App\Models\DropList;
use Illuminate\Database\Seeder;

class DropListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DropList::create([
            'name' => "time game",
          

        ]); 
    }
}