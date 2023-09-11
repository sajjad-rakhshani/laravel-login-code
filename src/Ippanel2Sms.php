<?php
namespace SajjadRakhshani\LaravelLoginCode;
class Ippanel2Sms implements SmsInterface {
    private $client;
    private $apikey;

    public function __construct()
    {
        $this->apikey = env('IPPANEL2_API_KEY');
        $this->client = new \IPPanel\Client($this->apikey);
    }

    public static function verify(string $mobile, int $code)
    {
        $sms = new self();
        $sms->client->sendPattern(
            env('IPPANEL2_LOGIN_PATTERN'),
            '+982153237',
            $mobile,
            [
                'VerificationCode' => $code
            ]
        );
    }

    public static function sendPattern(string $mobile, string $template, array $params = [])
    {
        $sms = new self();
        $sms->client->sendPattern(
            $template,
            '+982153237',
            $mobile,
            $params
        );
    }

}
