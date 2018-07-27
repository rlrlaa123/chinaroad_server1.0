<?php

use Illuminate\Database\Seeder;
use \App\FAQ;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FAQ::class, 20)->create();
    }
}
