<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class Globals
{
    static public $linkAfterAuthentication = 'link_after_authentication';


    static public function languages()
    {
        return ['ar', 'en'];
    }

    static public function share($title)
    {
        return \ShareButtons::page(URL::full(), __('tables.' . $title), [
            'title' => config('app.name'),
            'rel' => 'nofollow noopener noreferrer',
            'block_prefix' => '<ul class="flex flex-wrap gap-1 justify-center items-center">',
            'block_suffix' => '</ul>',
            'element_prefix' => '<li class="hover:bg-accent  bg-primary-light dark:bg-primary-dark">',
            'element_suffix' => '</li>',

        ])->copylink(['class' => 'hover:bg-accent  w-12 h-12 flex items-center justify-center', 'title' => __('str.copy_link'), 'text' => 'url new'])
            ->mailto(['class' => 'hover:bg-accent  w-12 h-12 flex items-center justify-center', 'title' => __('str.send_mail')])
            ->facebook(['class' => 'hover:bg-accent  w-12 h-12 flex items-center justify-center', 'title' => __('str.share_facebook')])
            ->twitter(['class' => 'hover:bg-accent  w-12 h-12 flex items-center justify-center', 'title' => __('str.share_x')])
            ->whatsapp(['class' => 'hover:bg-accent  w-12 h-12 flex items-center justify-center', 'title' => __('str.share_whatsapp')])
            ->telegram(['class' => 'hover:bg-accent  w-12 h-12 flex items-center justify-center', 'title' => __('str.share_telegram')])
            ->render();
    }

    static function supportedExtensions()
    {
        return ['json', 'php', 'android', 'ios', 'django', 'xlf', 'csv', 'html'];
    }

    static function logout()
    {
        if (Auth::check()) {
            session()->flush();

            auth('web')->logout();

            return redirect('readies');
        }
    }

    static function isPhone($data)
    {
        return preg_match("'^(([\+]([\d]{2,}))([0-9\.\-\/\s]{5,})|([0-9\.\-\/\s]{5,}))*$'", $data);
    }

    static function isEmail($data)
    {
        return preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data);
    }

    static function isUrl($data)
    {
        return preg_match("/^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([\/\w.-]*)*\/?$/", $data);
    }

    static function syntaxValue($key)
    {
        $key = str_replace('_', ' ', $key);
        $key = str_replace('-', ' ', $key);

        // Convert all uppercase letters to lowercase
        $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));

        //
        $key = trim($key, ' ');

        // Delete all symbols from the word
        $key = preg_replace('/[^\w\s]+/u', '', $key);

        // Delete duplicate underscore
        $key = preg_replace('/_+/', ' ', $key);

        // Delete all new line
        $key = preg_replace('/\n/u', ' ', $key);

        return $key;
    }

    static function syntaxPathName($key)
    {
        $key = trim($key, ' ');

        // Convert all Space to underscore
        $key = preg_replace('/ +/', '-', $key);

        // Convert all uppercase letters to lowercase
        $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));

        // Replace all non-English letters
        $key = preg_replace('/[^\00-\255]+/u', '', $key);

        // Delete all symbols from the word
        $key = preg_replace('/[^\w\s]+/u', '', $key);

        // Delete duplicate underscore
        $key = preg_replace('/_+/', '-', $key);

        return $key;
    }

    static function modes(): array
    {
        return [
            'guest-mode',
            'scheduling-mode',
            'broadcast-mode',
            'stop-mode',
        ];
    }

    static function typeUser($typeUser)
    {
        $types = ['presenter', 'guest', 'asking'];
        return $types[$typeUser];
    }
}
