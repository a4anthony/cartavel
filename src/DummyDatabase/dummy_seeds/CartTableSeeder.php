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
        $productsCount = DB::table(config('cartavel.items_table_name'))->count();

        if ($productsCount > 10) {
            $maxItems = 10;
        } else {
            $maxItems = $productsCount;
        }

        $users = DB::table(config('cartavel.users_table_name'))->get();

        Cart::truncate();

        foreach ($users as $user) {
            $products = DB::table(config('cartavel.items_table_name'))
                ->inRandomOrder()
                ->take($maxItems)
                ->get();

            foreach ($products as $product) {
                $cartItem = new Cart();
                $cartItem->user_id = $user->id;
                $cartItem->item_id = $product->{config('cartavel.items_table_unique_column')};
                $cartItem->quantity = random_int(1, 50);
                $cartItem->save();
            }
        }
    }
}