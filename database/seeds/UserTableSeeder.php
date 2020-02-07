<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr = [
            ['groupid'=>'1', 'user_pickname'=>'ADMIN', 'password'=>'81dc9bdb52d04dc20036dbd8313ed055', 'user_coolname'=>'ADMIN', 'user_pic'=>'', 'user_email'=>'admin@kedaikopi.com', 'notif'=>'Y', 'status'=>'AKTIF', 'salahpass'=>'0'],
            ['groupid'=>'2', 'user_pickname'=>'OWNER.KEDAI', 'password'=>'81dc9bdb52d04dc20036dbd8313ed055', 'user_coolname'=>'OWNER KEDAI KOPI', 'user_pic'=>'', 'user_email'=>'owner@kedaikopi.com', 'notif'=>'Y', 'status'=>'AKTIF', 'salahpass'=>'0'],
            ['groupid'=>'3', 'user_pickname'=>'PERASA.KOPI', 'password'=>'81dc9bdb52d04dc20036dbd8313ed055', 'user_coolname'=>'TUKANG NYOBAIN KOPI', 'user_pic'=>'', 'user_email'=>'penikmat@kedaikopi.com', 'notif'=>'Y', 'status'=>'AKTIF', 'salahpass'=>'0'],
            ];
        DB::table('user')->insert($arr);

        $hash123 = '$2y$12$35Ui234tOXEvz8e5YTQHoOVueiBt2fhfdAwwUqAByg49J36yQhNhy';
        DB::table('user')->update([
            'password' => $hash123,
        ]);
        echo "all password updated to '123' \n";
    }
}
