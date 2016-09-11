<?php

namespace CodeProject\Http\Controllers;


use CodeProject\Repositories\ProjectsNoteRepository;
use CodeProject\Services\ProjectNoteService;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{
    private $repository;
    private $service;

    public function __construct(ProjectsNoteRepository $rep,ProjectNoteService $service)
    {
        $this->repository = $rep;
        $this->service = $service;
    }
    public function index($id)
    {
        return   $this->repository->findwhere(['project_id'=>$id]);
    }
    public function store(request $request){
        return $this->service->create($request->all());
    }
    public function show($id,$notedid){
        return $this->repository->findWhere(['project_id'=>$id,'id'=>$notedid]);
    }
}
