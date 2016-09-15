<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 11/09/2016
 * Time: 18:51
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\User;
use  League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{
    public function transform(User $member)
    {
        return [
            'member_id' => $member->id,
            'member' => $member->name,
        ];
    }

}