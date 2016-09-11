<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\ProjectNote;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ProjectsNoteRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectsNoteRepositoryEloquent extends BaseRepository implements ProjectsNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNote::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
