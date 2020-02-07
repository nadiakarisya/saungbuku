<?php

namespace App\Console\Commands;

use App\KopiHelper\Registry;
use App\Models\Kontrak;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Close_Unapproved extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sipat:kontrak-close-overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close unapproved kontrak and rks approval if has passed approved due';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $module = "CLOSE:UNAPPROVED";
        try {
            DB::beginTransaction();
            $this->info("[$module] ------- START ---------");


            $kontrak = new Kontrak();

            $result = $kontrak->closeOverdueApproval(Registry::KONTRAK_STATUS_APPROVE_MA, Registry::SETTING_KEY_BATAS_HARI_APPROVAL_NOTADINAS);
            $result += $kontrak->closeOverdueApproval(Registry::KONTRAK_STATUS_APPROVE_RKS_BY_ASRENC, Registry::SETTING_KEY_BATAS_HARI_APPROVAL_RKS);

            DB::commit();

            $this->info("Affected rows: $result");
            $this->info("[$module] ------- SUCCESS ---------");

        } catch (\Exception $e) {
            DB::rollBack();

            $this->error($e->getMessage());
            $this->info("[$module] ------- FAILED ---------");
        }
    }
}
