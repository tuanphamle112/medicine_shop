<?php

namespace App\Helpers;

use Session;

class Helper
{
    public static function addMessageFlashSession($title, $message, $type = 'success')
    {
        $messages = Session::get('flash_messages', []);
        $messages[] = ['title' => $title, 'message' => $message, 'type' => $type];
        Session::flash('flash_messages', $messages);
    }

    public static function deleteFile($path)
    {
        if (is_file($path)) {
            unlink($path);
        }
    }
}
