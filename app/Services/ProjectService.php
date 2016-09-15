<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 29/08/2016
 * Time: 17:22
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidators;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    protected $repository;
    protected $validator;
    protected $filesystem;
    protected $storage;
    public function __construct(ProjectRepository $repository,ProjectValidators $validator,Filesystem $filesystem
    ,Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }
    public function create(array $data)
    {
        //enviar um email
        //disparar notificação
        //postar um tweet
        try
        {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }catch (ValidatorException $e)
        {
            return ['error' => true,
                    'message' => $e->getMessageBag()
            ];
        }
    }
    public function update(array $data,$id)
    {
        return $this->repository->update($data,$id);
    }
    public function createFile(Array $data){
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);
        $this->storage->put($projectFile->id.'.'.$data['extension'],$this->filesystem->get($data['file']));
    }
}