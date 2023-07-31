<?php

namespace app\helpers;

class FlashHelper
{
    public static function setSuccess(string $message): void
    {
        self::setFlash('success', $message);
    }

    public static function setError(string $message): void
    {
        self::setFlash('error', $message);
    }

    public static function setFlash(string $key, string $message): void
    {
        \Yii::$app->session->setFlash($key, $message);
    }
}
