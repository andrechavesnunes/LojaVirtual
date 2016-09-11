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
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    protected $repository;
    protected $validator;
    public function __construct(ProjectRepository $repository,ProjectValidators $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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
}