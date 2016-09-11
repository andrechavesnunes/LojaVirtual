<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 29/08/2016
 * Time: 18:46
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectNoteValidators extends LaravelValidator
{
    protected $rules = [
        'project_id' =>"required|integer",
        'title' =>'required',
        'note' =>'required'
        ];

}