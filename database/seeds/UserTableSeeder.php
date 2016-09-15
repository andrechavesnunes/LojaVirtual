<?php


use CodeProject\Entities\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\CodeProject\Entities\Client::truncate();
//        $factory(User::class)->create(
//        [
//            'name'=>'andre',
//            'email'=>'andre.nunes@adcos.com.br',
//            'password'=> bcrypt('123456'),
//            'remember_token'=>str_random(10)
//        ]
//        );
        factory(User::class)->create();
    }
}
