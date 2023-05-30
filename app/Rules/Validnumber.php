<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class Validnumber implements Rule
{
    public function passes($attribute, $value)
    {
        $pattern = '/^(\+7|8)\d{10}$/';
        return preg_match($pattern, $value);
    }

    public function message()
    {
        return 'Номер не соотвествует требуемому формату номеров';
    }
}
