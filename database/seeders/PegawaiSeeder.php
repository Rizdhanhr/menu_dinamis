<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 50; $i++){

    		Pegawai::insert([
    			'name' => $faker->name,
                'id_pekerjaan' => $faker->numberBetween(1,15),
    		]);

    	}
    }
}
