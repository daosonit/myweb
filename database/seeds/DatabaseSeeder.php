<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Call class
        $this->call(AdminsTableSeeder::class);
        $this->command->info('insert table admin done...');
    }
}
