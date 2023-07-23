<?php

namespace SajjadRakhshani\LaravelLoginCode;

class Sms
{
    public $smsPanel;
    public function __construct()
    {
        $smsPanel = env('SmsPanel');
        switch ($smsPanel){
            case 'Ippanel' :
                $this->smsPanel = new IppanelSms();
                break;
        }
    }
}
