<?php

namespace Modules\Student\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    public function run()
    {
        for ($i=0; $i<10; $i++) { 
        	$this->db->table("students")->insert($this->createTestStudents());
        }
    }

    public function createTestStudents()
    {
    	$faker = Factory::create();

    	return [
    		"name" => $faker->name(),
    		"email" => $faker->email,
    		"mobile" => $faker->phoneNumber,
    		"image" => $faker->imageUrl(50, 50)
    	];
    }
}
