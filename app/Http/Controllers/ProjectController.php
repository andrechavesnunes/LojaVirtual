<?php

namespace CodeProject\Http\Controllers;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ProjectController extends Controller
{
    private $repository;
    private $service;

    public function __construct(ProjectRepository $rep,ProjectService $service)
    {
        $this->repository = $rep;
        $this->service = $service;
    }
    public function index()
    {
        return   $this->repository->findWhere(['owner_id'=>Authorizer::getResourceOwnerId()]);
    }
    public function store(request $request){
        return $this->service->create($request->all());
    }
    public function show($id){

        if ($this->checkProjectPermissions($id))
            return $this->repository->find($id);
        else
            return ['error','Acesso Negado'];
    }

    public function checkProjectOwner($projectid)
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($projectid,$userId);
    }
    public function checkProjectMember($projectid)
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($projectid,$userId);
    }
    public function checkProjectPermissions($projectid)
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->checkProjectOwner($projectid) or $this->checkProjectMember($projectid);
    }
}
