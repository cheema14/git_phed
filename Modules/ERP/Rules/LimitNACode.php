<?php

namespace Modules\ERP\Rules;

use Illuminate\Contracts\Validation\Rule;

use Modules\ERP\Entities\Pp;

class LimitNACode implements Rule
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
            
            $data = Pp::where('na_id',$value)->get()->count();
            return $data < 2;
            
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This :attribute NA Constituency already has 2 Provincial constituenties.';
    }
}
