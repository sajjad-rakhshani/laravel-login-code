<?php
namespace SajjadRakhshani\LaravelLoginCode;
interface SmsInterface{
    public static function verify(string $mobile, int $code);

    public static function sendPattern(string $mobile, string $template, array $params = []);
}
