<?php


use A4anthony\Cartavel\Models\Cart;
use App\Models\User;
use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $maxItems = 10;
        $users = User::all();
        Cart::truncate();
        foreach ($users as $user) {
            for ($i = 1; $i <= $maxItems; $i++) {
                Cart::create([
                    'user_id' => $user->id,
                    'item_id' => $i,
                    'quantity' => random_int(1, 50)
                ]);
            }
        }
    }
}