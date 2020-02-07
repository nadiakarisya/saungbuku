<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class __ChangesAfterMigrateSeeder extends Seeder
{
    public function run(){
        $cwd  = dirname(__FILE__);
        echo "seeder directory : {$cwd} \n";
        chdir( $cwd . '/../..');
        $projectDir = getcwd();
        echo "project directory : {$projectDir} \n";

        $dir = "{$projectDir}/database/sql/changes_after_migrate/";
        $exclude = ['..', '.',
            '20190109.kel_prk_insert.sql',
            '20190123.insert_submenu_anggran.sql',
            '20190125_inserttable_unit.sql',
            '20190129_uniqueindex_prkpilih.sql',
            '20190131_altertable_droprenamekodeunit.sql',
        ];
        $scanned_directory = array_diff(scandir($dir), $exclude);

        foreach ($scanned_directory as $file) {
            $path = "{$dir}{$file}";
            try {
                DB::unprepared(file_get_contents($path));
            } catch (Exception $e) {
                echo "------------------------------------- {$path} \n";
                echo $e->getMessage() . "\n";
            }
            echo "---DONE exec : " . $file . "\n";
        }
    }
}