<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('menus')->truncate();
        DB::table('menus')->insert([
            ['description' => 'Bopis',              'price' => '35.00', 'type' => 'main'],
            ['description' => 'Sarsi Adobong Isda', 'price' => '35.00', 'type' => 'main'],
            ['description' => 'Porkchop',           'price' => '35.00', 'type' => 'main'],
            ['description' => 'Adobong Sitaw',      'price' => '20.00','type' => 'side'],
            ['description' => 'Ginisang Togue',     'price' => '20.00','type' => 'side'],
            ['description' => 'Plain Rice',         'price' => '10.00', 'type' => 'rice']
        ]);
    }
}
