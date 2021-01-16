<?php

use A4anthony\Cartavel\Traits\Seedable;
use Illuminate\Database\Seeder;

class CartDummyDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/../dummy_seeds/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('CartTableSeeder');
    }
}