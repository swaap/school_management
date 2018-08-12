<?php

use Illuminate\Database\Seeder;

class MassSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('masses')->insert([
            'mass_name' => 'Tonne',
        ]);
        DB::table('masses')->insert([
            'mass_name' => 'Kilogram',
        ]);
        DB::table('masses')->insert([
            'mass_name' => 'Gram',
        ]);
        DB::table('masses')->insert([
            'mass_name' => 'Milligram',
        ]);
        DB::table('masses')->insert([
            'mass_name' => 'Litre',
        ]);
        DB::table('masses')->insert([
            'mass_name' => 'Piece',
        ]);
    }

}
