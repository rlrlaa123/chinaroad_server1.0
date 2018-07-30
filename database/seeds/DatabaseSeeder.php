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
        DB::table('roles')->delete();
        DB::table('admins')->delete();
        DB::table('role_admin')->delete();
        DB::table('notices')->delete();
        DB::table('faqs')->delete();
        DB::table('inquires')->delete();

        $this->call(CategorySeeder::class);
        $this->call(ConversationSeeder::class);
        $this->call(ClassificationSeeder::class);
        $this->call(ContentsSeeder::class);
        $this->call(EditSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(NoticeSeeder::class);
        $this->call(FAQSeeder::class);
        $this->call(InquirySeeder::class);
    }
}
