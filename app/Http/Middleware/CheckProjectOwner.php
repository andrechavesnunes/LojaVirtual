<?php

namespace CodeProject\Http\Middleware;

use Closure;
use CodeProject\Repositories\ProjectRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class CheckProjectOwner
{
    private $repository;
    public function __construct(ProjectRepository $rep){
        $this->repository = $rep;
    }
    public function handle($request, Closure $next)
    {

        $userId = Authorizer::getResourceOwnerId();
        $id = $request->project;
        if ($this->repository->isOwner($id,$userId))
          return $next($request);
        else
          return response(['Error' => 'Acesso não permitido']);

    }
}
