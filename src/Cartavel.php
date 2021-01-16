<?php

namespace A4anthony\Cartavel;

use A4anthony\Cartavel\Models\Cart;
use A4anthony\Cartavel\Models\CartItem;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class Cartavel
 *
 * @package A4anthony\Cartavel
 */
class Cartavel
{
    /**
     * Welcome to cartavel
     *
     *
     * @return string
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function hello(): string
    {
        return 'Welcome to Cartavel';
    }

    /**
     * Get cart items
     *
     * @param int  $userId
     * @param bool $paginate
     *
     * @return mixed
     *
     * @throws Exception
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function get(int $userId, bool $paginate = true)
    {
        if ($userId < 0) {
            negativeArgs();
        }

        $cartItems = Cart::where('user_id', $userId);

        if ($paginate) {
            $cartItems = $cartItems->paginate(10);
        } else {
            $cartItems = $cartItems->get();
        }

        if (request()->wantsJson()) {
            return response()->json($cartItems, 200);
        }

        return $cartItems;
    }

    /**
     * Add item to cart
     *
     * @param int $userId
     * @param int $itemId
     * @param int $quantity
     *
     * @return mixed
     *
     * @throws Exception
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function add(int $userId, int $itemId, int $quantity)
    {
        if ($quantity < 0 || $userId < 0 || $itemId < 0) {
            negativeArgs();
        }
        if (Cart::where([['user_id', $userId], ['item_id', $itemId]])->exists()) {
            if (request()->wantsJson()) {
                throw new HttpResponseException(response()->json([
                    'error' => 'User already has item in cart'
                ], 422));
            }
            throw new Exception('User already has item in cart');
        }

        $cartItem = new Cart();
        $cartItem->user_id = $userId;
        $cartItem->item_id = $itemId;
        $cartItem->quantity = $quantity;
        $cartItem->save();

        if (request()->wantsJson()) {
            return response()->json($cartItem, 200);
        }

        return $cartItem;
    }

    /**
     * Update cart item
     *
     * @param int $userId
     * @param int $itemId
     * @param int $quantity
     *
     * @return mixed
     *
     * @throws Exception
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function update(int $userId, int $itemId, int $quantity)
    {
        if ($userId < 0 || $itemId < 0 || $quantity < 0) {
            negativeArgs();
        }

        $cart = Cart::where([['user_id', $userId], ['item_id', $itemId]])->update([
            'quantity' => $quantity
        ]);

        if (request()->wantsJson()) {
            return response()->json($cart, 200);
        }

        return $cart;
    }

    /**
     * Delete cart item
     *
     * @param int $userId
     * @param int $itemId
     *
     * @return mixed
     *
     * @throws Exception
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function delete(int $userId, int $itemId)
    {
        if ($userId < 0 || $itemId < 0) {
            negativeArgs();
        }

        Cart::where([['user_id', $userId], ['item_id', $itemId]])->delete();


        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Item has been deleted from cart'
            ], 200);
        }
    }

    /**
     * Empties user cart
     *
     * @param int $userId
     *
     * @return mixed
     *
     * @throws Exception
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function clear(int $userId)
    {
        if ($userId < 0) {
            negativeArgs();
        }

        Cart::where('user_id', $userId)->delete();

        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Cart cleared'
            ], 200);
        }

    }
}
