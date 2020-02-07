<?php

namespace App\Models;

use App\KopiHelper\Registry;
use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * @property $id
 * @property $label
 * @property $recipient
 * @property $from
 * @property $cc
 * @property $bcc
 * @property $subject
 * @property $view
 * @property $variables
 * @property $body
 * @property $attachments
 * @property $attempts
 * @property $sending
 * @property $failed
 * @property $error
 * @property $encrypted
 * @property $scheduled_at
 * @property $sent_at
 * @property $delivered_at
 */
class Email extends Model
{

    /**
     * The table in which the e-mails are stored.
     *
     * @var string
     */
    protected $table = 'emails';

    /**
     * The guarded fields.
     *
     * @var array
     */
    protected $guarded = [];


    public function insert(array $data){

        $new = $this;
        $new->fill($data);
        $new->save();

        return $new->id;
    }



    public function markAsSending()
    {
        $this->update([
            'status'  => Registry::EMAIL_STATUS_SENDING
        ]);
    }

    public function markAsFailed(Exception $exception)
    {
        $this->update([
            'status'  => Registry::EMAIL_STATUS_FAILED,
            'error'   => (string) $exception,
        ]);
    }

    public function markAsSent()
    {
        $this->update([
            'sent_at' => 'now()',
            'status'  => Registry::EMAIL_STATUS_SENT,
            'error'   => null,
        ]);
    }

    public static function listUnsentEmail($limit = 10){
        $new = Registry::EMAIL_STATUS_NEW;
        $failed = Registry::EMAIL_STATUS_FAILED;
        return self::whereNull('sent_at')
            ->whereRaw("status = '$new' OR status = '$failed'")
            ->orderBy('created_at', 'asc')
            ->limit($limit)
            ->get();
    }

    public function getId()
    {
        return $this->id;
    }


    public function getRecipientsAsString()
    {
        $glue = ', ';

        return implode($glue, (array) $this->to);
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function hasFailed()
    {
        return $this->status == Registry::EMAIL_STATUS_FAILED;
    }

}
