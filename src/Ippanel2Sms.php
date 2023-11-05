<?php
namespace SajjadRakhshani\LaravelLoginCode;
class Ippanel2Sms implements SmsInterface {
    private $client;
    private $apikey;

    public function __construct()
    {
        $this->apikey = get_option('ippanel_api_key');
        $this->client = new \IPPanel\Client($this->apikey);
    }

    public static function verify(string $mobile, int $code)
    {
        $sms = new self();
        $sms->client->sendPattern(
            get_option('login_pattern'),
            get_option('sms_sender'),
            $mobile,
            [
                'code' => $code
            ]
        );
    }

    public static function sendPattern(string $mobile, string $template, array $params = [])
    {
        $sms = new self();
        $sms->client->sendPattern(
            $template,
            get_option('sms_sender'),
            $mobile,
            $params
        );

    }

}
