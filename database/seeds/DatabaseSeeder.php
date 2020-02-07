<?php

use App\KopiHelper\Registry;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // for testing purposes
    const ENABLE_TRANSACTION_SEEDER = true;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $start = microtime(true);

        $this->call(__TableMasterSeeder::class);
        $this->call(__TableTransactionSeeder::class);

        //$this->call(__ChangesAfterMigrateSeeder::class);


        if (!self::ENABLE_TRANSACTION_SEEDER){
            echo "TRANSACTION SEEDER NOT ENABLED!!! ";
            return null;
        }

        $end = microtime(true);
        $seconds = $end - $start;

        echo "SEEDER executed in $seconds seconds \n";
    }
}
