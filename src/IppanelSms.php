<?php

namespace SajjadRakhshani\LaravelLoginCode;

class IppanelSms
{
    private $apikey = "ffa928b287bea90f16e7e4e";
    private $secret = "kksskjh!!2223jhghj@@";
    private $token;
    public function __construct()
    {
        $result = $this->sendCurl(
            adress: 'https://RestfulSms.com/api/Token',
            data: [
                'UserApiKey' => $this->apikey,
                'SecretKey' => $this->secret
            ]
        );
        $this->token = $result->TokenKey;
    }

    private static function sendCurl(string $adress, array $header = [], array $data = []){
        $ch = curl_init($adress);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array_merge(['Content-Type: application/json'], $header)
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    public static function send(string $message, string $to, string $lineNumber = '300056805134')
    {
        $self = new self();
        $result = self::sendCurl(
            'https://RestfulSms.com/api/MessageSend',
            ['x-sms-ir-secure-token: ' . $self->token],
            [
                'Messages' => [$message],
                'MobileNumbers' => [$to],
                'LineNumber' => $lineNumber
            ]
        );
        return $result;
    }

    public static function verify(string $mobile, int $code){
        return self::sendPattern($mobile, '75173', ['VerificationCode'=>$code]);
    }

    public static function sendPattern(string $mobile, int $template, array $params = [])
    {
        $self = new self();
        $ParameterArray = [];
        foreach ($params as $param => $value){
            $ParameterArray[] = [
                'Parameter' => $param,
                'ParameterValue' => $value
            ];
        }
        $result = self::sendCurl(
            'https://RestfulSms.com/api/UltraFastSend',
            [
                'x-sms-ir-secure-token: ' . $self->token,
            ],
            [
                'ParameterArray' => $ParameterArray,
                'Mobile' => $mobile,
                'TemplateId' => $template
            ]
        );
        return $result;
    }
}
