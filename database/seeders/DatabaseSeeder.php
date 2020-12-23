<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        UserModel::create([
            'Name'=>'WebMaster',
            'NIC'=>'1234',
            'PasswordHash'=>Hash::make('admin'),
            'Address'=>'fill me',
            'Phone'=>'fill me',
            'UserType'=>'Admin'
        ]);
    }
}
