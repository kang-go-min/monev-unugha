<?php
namespace App\Helpers;

class Helper
{

    public static function appIcon($type, $extension = 'svg')
    {
        $icon = [
            'application/pdf' => 'pdf',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'excel',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'word',
            'application/vnd.ms-excel' => 'excel',
            'application/vnd.ms-word' => 'word',
        ];

        return $icon[$type] . '.' . $extension;
    }
}
