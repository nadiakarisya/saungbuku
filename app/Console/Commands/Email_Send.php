<?php

namespace App\Console\Commands;

use App\KopiHelper\Registry;
use App\Models\Email;
use App\Models\Kontrak;
use App\Services\EmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Email_Send extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sipat:email-send {count=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send unsent email';

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
        $module = "SIPAT:EMAIL-SEND";
        try {
            DB::beginTransaction();
            $this->info("[$module] ------- START ---------");

            $limit = $userId = $this->argument('count') ?? config("mail.send_count");

            $emails = Email::listUnsentEmail($limit);

            if ($emails->isEmpty()) {
                $this->line('There is nothing to send.');

                $this->info("[$module] ------- FINISH ---------");

                return;
            }

            $progress = $this->output->createProgressBar($emails->count());

            foreach ($emails as $email) {
                $progress->advance();
                try {
                    $email->markAsSending();

                    EmailService::sendNow($email);

                    $email->markAsSent();
                } catch (Exception $e) {
                    $email->markAsFailed($e);
                }
            }

            $progress->finish();

            $this->result($emails);

            DB::commit();

            $this->info("[$module] ------- FINISH ---------");

        } catch (\Exception $e) {
            DB::rollBack();

            $this->error($e->getMessage());
            $this->info("[$module] ------- FAILED ---------");
        }
    }

    protected function result($emails)
    {
        $headers = ['ID', 'Recipient', 'Subject', 'Status'];

        $this->line("\n");

        $this->table($headers, $emails->map(function (Email $email) {
            return [
                $email->getId(),
                $email->getRecipientsAsString(),
                $email->getSubject(),
                $email->hasFailed() ? 'Failed' : 'OK',
            ];
        }));
    }
}
