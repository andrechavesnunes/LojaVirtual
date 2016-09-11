<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$factory->define(CodeProject\Entities\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});
$factory->define(CodeProject\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsable' => $faker->name,
        'email' =>$faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence
    ];

});
$factory->define(CodeProject\Entities\Project::class, function (Faker\Generator $faker) {
        return [
            'owner_id' =>8,
            'client_id' =>random_int(1,1),
            'name' => $faker->word,
            'description' => $faker->sentence,
            'progress' =>random_int(1,100),
            'status' => random_int(1,3),
            'due_date' =>$faker->date('now')
        ];
});
$factory->define(CodeProject\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' =>rand(2,2),
        'title' =>$faker->word,
        'note' => $faker->paragraph,
    ];
});

