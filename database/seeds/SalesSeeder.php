<?php

use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 50;
        
        for ($i = 0; $i < $lphpimit; $i++) {
            DB::table('sales')->insert([
                'no_identitas' => $faker->unique()->randomNumber($nbDigits=6),
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'kota' => $faker->city,
                'telepon' => $faker->phoneNumber,
            ]);
        }
    }
}
