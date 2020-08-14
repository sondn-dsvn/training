<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'id' => 1,
                'sender' => 3,
                'receiver' => 2,
            ],
        ]);
    }
}
