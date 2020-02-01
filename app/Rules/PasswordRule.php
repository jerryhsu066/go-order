<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        unset($attribute);
        if (preg_match('/^[a-zA-Z\d#?!@$%^&*-]+$/', $value)) {
            if (preg_match('/^[a-zA-Z]+$/', $value))
                return false;
            if (preg_match('/^[\d]+$/', $value))
                return false;
            if (preg_match('/^[#?!@$%^&*-]+$/', $value))
                return false;

            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This password format is not valid';
    }
}

