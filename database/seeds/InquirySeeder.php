<?php

use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            $user = \App\User::all();

            $user->each(function ($user) {
                $user->inquires()->save(factory(App\Inquiry::class)->make());
            });
        }
    }
}