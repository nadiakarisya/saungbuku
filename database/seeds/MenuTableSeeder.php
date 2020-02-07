<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
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
            ['id'=>'1', 'nama'=>'Administrator', 'uri'=>'', 'id_menu_induk'=>'0', 'id_menu_anak'=>'0', 'urutan'=>'3', 'aktif'=>'Y', 'icon'=>null, 'class'=>'entypo-database', 'keterangan'=>''],
            ['id'=>'2', 'nama'=>'Daftar Menu', 'uri'=>'administrator/menu', 'id_menu_induk'=>'1', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'list-ul', 'keterangan'=>''],
            ['id'=>'3', 'nama'=>'Grup Pengguna', 'uri'=>'administrator/group', 'id_menu_induk'=>'1', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'users', 'keterangan'=>''],
            ['id'=>'4', 'nama'=>'Daftar User', 'uri'=>'administrator/user', 'id_menu_induk'=>'1', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'user', 'keterangan'=>''],
            ['id'=>'5', 'nama'=>'Tentang Aplikasi', 'uri'=>'', 'id_menu_induk'=>'0', 'id_menu_anak'=>'0', 'urutan'=>'4', 'aktif'=>'Y', 'icon'=>null, 'class'=>'help', 'keterangan'=>'0'],
            ['id'=>'6', 'nama'=>'Tentang', 'uri'=>'about', 'id_menu_induk'=>'5', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'help', 'keterangan'=>'0'],
            ['id'=>'7', 'nama'=>'Log Version', 'uri'=>'log', 'id_menu_induk'=>'5', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'phone', 'keterangan'=>'0'],
            ['id'=>'8', 'nama'=>'Kontak', 'uri'=>'contact', 'id_menu_induk'=>'5', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'entypo-phone', 'keterangan'=>'0'],
            ['id'=>'9', 'nama'=>'Pemilik Kedai', 'uri'=>'', 'id_menu_induk'=>'0', 'id_menu_anak'=>'0', 'urutan'=>1, 'aktif'=>'Y', 'icon'=>null, 'class'=>'code', 'keterangan'=>'0'],
            ['id'=>'10', 'nama'=>'Tentang Kedai', 'uri'=>'kedai/tentang', 'id_menu_induk'=>'9', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'doc-portrait', 'keterangan'=>'0'],
            ['id'=>'11', 'nama'=>'Menu Kedai', 'uri'=>'kedai/menu', 'id_menu_induk'=>'9', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'notebook', 'keterangan'=>'0'],

            ['id'=>'12', 'nama'=>'Penikmat Rasa', 'uri'=>'', 'id_menu_induk'=>'0', 'id_menu_anak'=>'0', 'urutan'=>2, 'aktif'=>'Y', 'icon'=>null, 'class'=>'comment', 'keterangan'=>'0'],
            ['id'=>'13', 'nama'=>'Jejak Penikmat', 'uri'=>'penikmat/jejak', 'id_menu_induk'=>'12', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'map', 'keterangan'=>'0'],
            ['id'=>'14', 'nama'=>'Catatan Penikmat', 'uri'=>'penikmat/catatan', 'id_menu_induk'=>'12', 'id_menu_anak'=>'0', 'urutan'=>null, 'aktif'=>'Y', 'icon'=>null, 'class'=>'edit', 'keterangan'=>'0'],

        ];
        DB::table('menu')->insert($arr);
    }
}
