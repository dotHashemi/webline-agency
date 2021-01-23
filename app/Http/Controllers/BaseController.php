<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $alerts = [
        'update' => 'با موفقیت بروزرسانی شد.',
        'delete' => 'با موفقیت حذف شد.',
        'create' => 'با موفقیت اضافه شد.',
        'login'  => 'با موفقیت وارد شدید.'
    ];


    protected function ValidateOption($key)
    {
        $option = Option::where('key', $key)->first();

        if (!$option)
            Option::create([
                'key'   => $key,
                'value' => 0
            ]);

        return;
    }

    protected function FormatName($name)
    {
        $name = trim($name);

        $result = $name[0];

        for ($i = 1; $i < strlen($name); $i++) {
            if ($name[$i] == ' ') {
                if ($name[$i - 1] != ' ') {
                    $result .= $name[$i];
                }
            } else {
                $result .= $name[$i];
            }
        }

        if (strlen($result) >= 3)
            return $name;
        else
            return null;
    }

    protected function ValidateEmail($email)
    {
        if (preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,10}$/", $email))
            return true;
        return false;
    }

    protected function FormatNumber($string)
    {
        if (gettype($string) == 'string') {
            $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

            $num = range(0, 9);
            $convertedPersianNums = str_replace($persian, $num, $string);
            $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

            return $englishNumbersOnly;
        }
    }
}
