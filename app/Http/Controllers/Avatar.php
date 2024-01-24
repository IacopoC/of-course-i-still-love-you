<?php

namespace App\Http\Controllers;
use Multiavatar;

class Avatar
{
    public static function getAvatar($userId): string
    {
        $multiavatar = new Multiavatar();
        $svgCode = $multiavatar->generate($userId, null, null);

        return $svgCode;
    }
}
