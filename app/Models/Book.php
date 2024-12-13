<?php

namespace App\Models;

use App\Models\Category;
use App\Models\PaymentBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo( Category::class,"CategoryID","id");
    }

    public function paymentBooks()
    {
        return $this->hasMany(PaymentBook::class);
    }
}
