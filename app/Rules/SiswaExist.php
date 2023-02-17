<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Siswa;

class SiswaExist implements Rule
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
        return Siswa::select('nisn')->where('nisn',$value)->count() > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Student not in data.';
    }
}
