<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array('email'       => 'daodangson.it@gmail.com',
                                          'password'    => bcrypt('son14051991'),
                                          'name'        => 'Dao Dang Son',
                                          'phone'       => '01632399789',
                                          'address'     => 'Cam Ly - Luc Nam - Bac Giang',
                                          'super_man' => 1,
                                          'status'      => 1));

        DB::table('users')->insert(array('email'       => 'daodangson.it@gmail.com',
                                          'password'    => bcrypt('son14051991'),
                                          'name'        => 'Dao Dang Son',
                                          'phone'       => '01632399789',
                                          'address'     => 'Cam Ly - Luc Nam - Bac Giang',
                                          'super_man' => 1,
                                          'status'      => 1));

        DB::table('customers')->insert(array('email'       => 'daodangson.it@gmail.com',
                                          'password'    => bcrypt('son14051991'),
                                          'name'        => 'Dao Dang Son',
                                          'phone'       => '01632399789',
                                          'address'     => 'Cam Ly - Luc Nam - Bac Giang',
                                          'super_man' => 1,
                                          'status'      => 1));

        DB::table('employees')->insert(array('email'       => 'daodangson.it@gmail.com',
                                          'password'    => bcrypt('son14051991'),
                                          'name'        => 'Dao Dang Son',
                                          'phone'       => '01632399789',
                                          'address'     => 'Cam Ly - Luc Nam - Bac Giang',
                                          'super_man' => 1,
                                          'status'      => 1));
    }
}
