<?php

namespace App\Models;

use App\Models\User;
use App\Models\PaymentBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_id',
        'book_id',
        'status',
        'totalAmount'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->hasManyThrough(Book::class, PaymentBook::class);
    }

    public function paymentbook()
    {
        return $this->hasMany(PaymentBook::class);
    }
}
