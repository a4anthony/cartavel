<?php

namespace A4anthony\Cartavel\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table;

    protected $guarded = [];

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $this->table = config('cartavel.cart_table_name');
    }

}
