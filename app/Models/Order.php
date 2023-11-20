<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
   

    public function product()
    { 
        
        return $this->belongsTo(Product::class);
    }

   
}
