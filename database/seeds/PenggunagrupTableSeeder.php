<?php

use Illuminate\Database\Seeder;

class PenggunagrupTableSeeder extends Seeder
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
            ['nama'=>'SUPERADMIN', 'lvl_user'=>'Y', ],
            ['nama'=>'OWNER', 'lvl_user'=>'Y', ],
            ['nama'=>'PERASA', 'lvl_user'=>'Y', ],
        ];
        DB::table('pengguna_grup')->insert($arr);
    }
}
