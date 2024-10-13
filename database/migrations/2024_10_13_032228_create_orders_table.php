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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing primary key column named OrderID
            $table->foreignId('UserID')->constrained('users')->onDelete('cascade'); // This will create a foreign key referencing the Users table
            $table->timestamp('OrderDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('Status', 50);
            $table->decimal('TotalAmount', 10, 2);
            $table->string('ShippingAddress', 255)->nullable();
            $table->string('ShippingCity', 50)->nullable();
            $table->string('ShippingState', 50)->nullable();
            $table->string('ShippingZipCode', 10)->nullable();
            $table->string('ShippingCountry', 50)->nullable();
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
        Schema::dropIfExists('orders');
    }
};
