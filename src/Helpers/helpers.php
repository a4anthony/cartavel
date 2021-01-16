<?php

namespace A4anthony\Cartavel;

use A4anthony\Cartavel\Models\Cart;
use Illuminate\Http\Exceptions\HttpResponseException;
use Exception;

if (!function_exists('negativeArgs')) {

    function negativeArgs()
    {
        if (request()->wantsJson()) {
            throw new HttpResponseException(response()->json([
                'error' => 'All argument(s) must be greater than or equal to 0'
            ], 422));
        }
        throw new Exception('All Argument(s) must be greater than or equal to 0');
    }
}

if (!function_exists('checkUserInCart')) {

    function checkUserInCart($userId)
    {
        if (!Cart::where('user_id', $userId)->exists()) {
            if (request()->wantsJson()) {
                throw new HttpResponseException(response()->json([
                    'error' => 'User has no item in cart'
                ], 422));
            }
            throw new Exception('User has no item in cart');
        }
    }
}
if (!function_exists('checkItemInCart')) {

    function checkItemInCart($userId, $itemId)
    {

        checkUserInCart($userId);
        if (!Cart::where([['user_id', $userId], ['item_id', $itemId]])->exists()) {
            if (request()->wantsJson()) {
                throw new HttpResponseException(response()->json([
                    'error' => 'User does not have item in cart'
                ], 422));
            }
            throw new Exception('User does not have item in cart');
        }
    }
}















