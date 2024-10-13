<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing primary key column named OrderItemID
            $table->foreignId('OrderID')->constrained('orders')->onDelete('cascade'); // This will create a foreign key referencing the Orders table
            $table->foreignId('BookID')->constrained('books')->onDelete('cascade'); // This will create a foreign key referencing the Books table
            $table->integer('Quantity')->unsigned(); // This will create a Quantity column that cannot be null
            $table->decimal('Price', 10, 2); // This will create a Price column with a precision of 10 and a scale of 2
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
