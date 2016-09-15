<?php

namespace CodeProject\Repositories;

use CodeProject\Presenters\ProjectPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeProject\Repositories\ProjectRepositories;
use CodeProject\Entities\Project;
use CodeProject\Validators\ProjectValidator;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function isOwner($projectId,$userId)
    {
        return (count($this->findWhere(['id'=>$projectId,'owner_id'=>$userId]))>0);
    }
    public function hasMember($projectId,$memberId)
    {
        $project = $this->find($projectId);
        foreach ($project->members  as $member)
        {
            if ($member->id == $memberId)
            {
                return true;
            }
            return false;
        }

    }
    public function presenter()
    {
        return ProjectPresenter::class;
    }
}
