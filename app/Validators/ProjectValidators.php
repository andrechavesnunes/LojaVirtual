<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 29/08/2016
 * Time: 18:46
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidators extends LaravelValidator
{
    protected $rules = [
        'owner_id' =>"required|integer",
        'client_id' =>'required|integer',
        'name' =>'required',
        'progress'=>'required|integer',
        'status'=>'required|integer',
        'due_date'=>'required'
        ];

}