<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 29/08/2016
 * Time: 18:46
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ClientValidators extends LaravelValidator
{
    protected $rules = [
        'name' =>"required|max:255",
        'responsible' =>'required|max:255',
        'email' =>'required|email',
        'phone'=>'required',
        'address'=>'required'
        ];

}