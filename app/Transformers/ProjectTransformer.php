<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 11/09/2016
 * Time: 18:51
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\Project;
use  League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members'];
    public function transform(Project $Project)
    {
        return [
            'project_id' => $Project->id,
            'client_id' => $Project->client_id,
            'owner_id' => $Project->owner_id,
            'members' => $Project->members,
            'project' => $Project->name,
            'Description' => $Project->description,
            'Progress' => $Project->progress,
            'Status' => $Project->status,
            'due_date' => $Project->due_date,
        ];
    }
    public function  includeMembers(Project $project)
    {
        return $this->collection($project->members,new ProjectMemberTransformer());
    }

}