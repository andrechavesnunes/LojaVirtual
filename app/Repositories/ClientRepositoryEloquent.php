<?php
/**
 * Created by PhpStorm.
 * User: andre.nunes
 * Date: 28/08/2016
 * Time: 18:49
 */

namespace CodeProject\Repositories;


use CodeProject\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function Model(){
        return Client::class;
    }
}