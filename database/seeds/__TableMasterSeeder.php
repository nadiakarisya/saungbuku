<?php
use Illuminate\Database\Seeder;

class __TableMasterSeeder extends Seeder
{
    public function run(){
        $this->call(UserTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(MenuaksesTableSeeder::class);
        $this->call(PenggunagrupTableSeeder::class);

    }
}