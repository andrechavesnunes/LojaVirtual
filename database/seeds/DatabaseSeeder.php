<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientTableSeeder::class);
        $this->call(ProjectTableSeeder::class );
        $this->call(ProjectNoteTableSeeder::class );
        //$this->call(UserTableSeeder::class);

    }
}