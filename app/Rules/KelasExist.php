<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Kelas;

class KelasExist implements Rule
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
        return Kelas::select('nm_kelas')->where('nm_kelas',$value)->count() > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Class not in data.';
    }
}
