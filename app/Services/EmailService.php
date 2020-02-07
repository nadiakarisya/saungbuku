<?php

namespace App\Services;



use App\Models\Email;
use Illuminate\Support\Facades\Mail;

class EmailService
{

    private $data = array();

    public function __construct()
    {

    }

    public static function compose()
    {
        return new self;
    }

    public function label(string $data){
        $this->data["label"] = $data;

        return $this;
    }

    public function from(string $data){
        $this->data["from"] = $data;

        return $this;
    }

    /**
     * @param array|string $data Set Recipient
     * @return $this
     */
    public function to($data){
        if(!is_array($data)){
            $data = [$data];
        }

        $this->data["to"] = json_encode($data);

        return $this;
    }


    /**
     * @param array|string $data Set CC
     * @return $this
     */
    public function cc($data){
        if(!is_array($data)){
            $data = [$data];
        }

        $this->data["recipient"] = json_encode($data);

        return $this;
    }

    /**
     * @param array|string $data Set BCC
     * @return $this
     */
    public function bcc($data){
        if(!is_array($data)){
            $data = [$data];
        }

        $this->data["recipient"] = json_encode($data);

        return $this;
    }

    public function subject(string $data){
        $this->data["subject"] = $data;

        return $this;
    }

    public function body(string $data){
        $this->data["body"] = $data;

        return $this;
    }

    public function send(){
        $model = new Email();
        $model->insert($this->data);
    }

    public static function sendNow(Email $email){
        Mail::send([], [], function ($message) use ($email){
            $message
                ->to(json_decode($email->to))
                ->cc($email->cc ? json_decode($email->cc) : [])
                ->bcc($email->bcc ? json_decode($email->bcc) : [])
                ->subject($email->subject)
                ->setBody($email->body, 'text/html')
                ->setFrom(config("mail.from.address"), config("mail.from.name"))
            ;
        });
    }

}
