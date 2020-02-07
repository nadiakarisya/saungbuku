<?php

use JeroenZwart\CsvSeeder\CsvSeeder;

class BusTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/bus.csv';
        $this->timestamps = FALSE;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::disableQueryLog();
        parent::run();
    }
}
