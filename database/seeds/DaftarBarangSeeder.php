<?php

use Illuminate\Database\Seeder;

class DaftarBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $limit = 50;
        
        for ($i = 0; $i < $limit; $i++) {
            DB::table('daftar_barang')->insert([
                'kode_barang' => $faker->unique()->randomNumber($nbDigits=6),
                'nama_barang' => $faker->productName,
                'satuan' => $faker->randomElement(['KG','PCS','DOZEN','GRAM','LITRE']),
            ]);
        }
    }
}
