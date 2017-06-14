<?php

namespace App\Helpers;

use Session;
use App\Eloquent\Image;
use App\Eloquent\User;

class Helper
{

    public static function addMessageFlashSession($title, $message, $type = 'success')
    {
        $messages = Session::get('flash_messages', []);
        $messages[] = ['title' => $title, 'message' => $message, 'type' => $type];
        Session::flash('flash_messages', $messages);
    }

    public static function addMessageFlashFrontendSession($title, $message, $type = 'success')
    {
        $messages = Session::get('flash_frontend_messages', []);
        $messages[] = ['title' => $title, 'message' => $message, 'type' => $type];
        Session::flash('flash_frontend_messages', $messages);
    }

    public static function deleteFile($path)
    {
        if (is_file($path)) {
            unlink($path);
        }
    }

    public static function saveImageMedicine($mediId, $pathOrigin, $pathThumb, $isMain = 1)
    {
        $image = new Image;
        $image->medicine_id = $mediId;
        $image->path_origin = $pathOrigin;
        $image->path_thumb = $pathThumb;
        $image->is_main = $isMain;

        return $image->save();
    }

    public static function formatPrice($price)
    {
        $format = new \NumberFormatter(config('custom.price.locale_format'), \NumberFormatter::CURRENCY);

        return $format->format($price);
    }

    public static function getSymbolCurrency()
    {
        $format = new \NumberFormatter(config('custom.price.locale_format'), \NumberFormatter::CURRENCY);

        return $format->getSymbol(\NumberFormatter::CURRENCY_SYMBOL);
    }

    public static function numberIntegerFormat($number)
    {
        return number_format($number);
    }

    public static function numberFloatFormat($number)
    {
        return number_format($number, 2);
    }

    public static function createOrGetUserSocial($provider, $providerName)
    {
        $account = User::where('provider', $providerName)
            ->where('provider_user_id', $provider->getId())
            ->first();

        if (!$account) {
            $email = $provider->getEmail();
            $issetEmail = User::withTrashed()->where('email', $email)->first();

            if ($issetEmail) {
                $email = $providerName . '.' .$provider->getId() . '@gmail.com';
            }

            $account = new User([
                'provider_user_id' => $provider->getId(),
                'provider' => $providerName,
                'email' => $email,
                'display_name' => $provider->getName(),
            ]);

            if ($provider->getAvatar()) {
                $account->avatar = $provider->getAvatar();
            }

            $account->save();
        }

        return $account;
    }
}
