<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = ['first_name', 'last_name', 'company_name', 'position', 'personal_email', 'job_email',
                            'personal_phone', 'job_phone', 'srch_phone'];

    /*
     * Fill attributes before insert or update
     */
    public function fill(array $attributes)
    {
        $res =  parent::fill($attributes);;

        if ($attributes) {
            $this->attributes['srch_phone'] = preg_replace('/\D+/', '', Arr::get($this->attributes, 'job_phone')).' '
                .preg_replace('/\D+/', '', Arr::get($this->attributes, 'personal_phone'));
        }

        return $res;
    }

    /*
     * Function to validate phone number in Request
     */

    public static function checkPhone($attribute, $value, $parameters, $validator) {
        $number = $value;
        $lengths = Arr::get($parameters, 0, null);
        {
            if (!is_array($lengths)) {
                $lengths = array(7, 10, 11);
            }

            $number = preg_replace('/\D+/', '', $number);

            return in_array(strlen($number), $lengths);
        }
    }
}
