<?php

namespace App\Http\Controllers\UploadController\UploadFunctions;

class SanitizerUpload
{
    public static function sanitize(string $string): string
    {
        $string = str_replace(' ', '_', $string);
        $string = preg_replace('/[^a-zA-Z0-9_]/', '', $string);
        $string = strtolower($string);
        return $string;
    }
}
