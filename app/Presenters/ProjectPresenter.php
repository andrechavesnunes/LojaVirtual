<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 11/09/2016
 * Time: 19:05
 */

namespace CodeProject\Presenters;

use CodeProject\Transformers\ProjectTransformer;
Use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new ProjectTransformer();
    }

}