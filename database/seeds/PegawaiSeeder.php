<?php

use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create(); //import library faker
        $limit = 100;
        
        for ($i = 0; $i < $limit; $i++) {
            DB::table('pegawai')->insert([
                'no' => $faker->unique()->randomNumber,
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['male','female']),
                'alamat' => $faker->address,
                'no_telp' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
            ]);
        }
    }
}
