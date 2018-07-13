<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conversations')->delete();
        DB::table('categories')->delete();
        DB::table('contents')->delete();
        DB::table('classifications')->delete();
        DB::table('edits')->delete();

        $this->call(CategorySeeder::class);
        $this->call(ConversationSeeder::class);
        $this->call(ClassificationSeeder::class);
        $this->call(ContentsSeeder::class);
        $this->call(EditSeeder::class);
    }
}
