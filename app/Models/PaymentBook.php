<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentBook extends Model
{
    use HasFactory;
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
