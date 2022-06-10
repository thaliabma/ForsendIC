<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OnlyICValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $parts = explode('@', $value);
        $email = $parts[1];
        if (preg_match("/ic.ufal.br/", $email))
            return true;
        else
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Apenas emails do Instituto de Computação da UFAL são aceitos';
    }
}
