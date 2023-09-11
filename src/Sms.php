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
            case 'Ippanel2' :
                $this->smsPanel = new Ippanel2Sms();
                break;
        }
    }
}
