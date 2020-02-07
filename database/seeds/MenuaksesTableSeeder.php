<?php

use Illuminate\Database\Seeder;

class MenuaksesTableSeeder extends Seeder
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
            ['id'=>'1', 'id_menu'=>'1', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'2', 'id_menu'=>'2', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'3', 'id_menu'=>'3', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'4', 'id_menu'=>'4', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'5', 'id_menu'=>'5', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'6', 'id_menu'=>'6', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'7', 'id_menu'=>'7', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'8', 'id_menu'=>'8', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'9', 'id_menu'=>'9', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'10', 'id_menu'=>'10', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'11', 'id_menu'=>'11', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'12', 'id_menu'=>'12', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'13', 'id_menu'=>'13', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'14', 'id_menu'=>'14', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'15', 'id_menu'=>'15', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'16', 'id_menu'=>'16', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'17', 'id_menu'=>'17', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'18', 'id_menu'=>'18', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'19', 'id_menu'=>'19', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'20', 'id_menu'=>'20', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'21', 'id_menu'=>'21', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'22', 'id_menu'=>'22', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'23', 'id_menu'=>'23', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'24', 'id_menu'=>'24', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'25', 'id_menu'=>'25', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'26', 'id_menu'=>'26', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'27', 'id_menu'=>'27', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'28', 'id_menu'=>'28', 'id_pengguna_grup'=>'1', 'status'=>'1'],
            ['id'=>'29', 'id_menu'=>'29', 'id_pengguna_grup'=>'1', 'status'=>'1'],
        ];
        DB::table('menu_akses')->insert($arr);
    }
}
